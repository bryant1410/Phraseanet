<?php

namespace Alchemy\Phrasea\SearchEngine\Elastic\Structure;

use Alchemy\Phrasea\SearchEngine\Elastic\Exception\MergeException;
use Alchemy\Phrasea\SearchEngine\Elastic\Mapping;
use Alchemy\Phrasea\SearchEngine\Elastic\RecordHelper;
use Alchemy\Phrasea\SearchEngine\Elastic\Thesaurus\Concept;
use Alchemy\Phrasea\SearchEngine\Elastic\Thesaurus\Helper as ThesaurusHelper;
use Assert\Assertion;
use databox_field;

/**
 * @todo Field labels
 */
class Field
{
    private $name;
    private $type;
    private $is_searchable;
    private $is_private;
    private $is_facet;      // bool return facet for this field
    private $facets_size;   // number of facets to return (null=default, 0= no limit)
    private $thesaurus_roots;
    private $used_by_collections;

    public static function createFromLegacyField(databox_field $field)
    {
        $type = self::getTypeFromLegacy($field);
        $databox = $field->get_databox();

        // Thesaurus concept inference
        $xpath = $field->get_tbranch();
        if ($type === Mapping::TYPE_STRING && !empty($xpath)) {
            $roots = ThesaurusHelper::findConceptsByXPath($databox, $xpath);
        } else {
            $roots = null;
        }

        // for phraseanet : 0=no facets (also returns isAggregable()=false)  ;  -1=all facets
        $facet = $field->isAggregable();
        $facets_size = $field->getAggregableSize();
        if($facets_size === -1) {
            // for ES 0=all facets
            $facets_size = 0;
        }

        return new self($field->get_name(), $type, [
            'searchable' => $field->is_indexable(),
            'private' => $field->isBusiness(),
            'facet' => $facet,
            'facets_size' => $facets_size,
            'thesaurus_roots' => $roots,
            'used_by_collections' => $databox->get_collection_unique_ids()
        ]);
    }

    private static function getTypeFromLegacy(databox_field $field)
    {
        $type = $field->get_type();
        switch ($type) {
            case databox_field::TYPE_DATE:
                return Mapping::TYPE_DATE;
            case databox_field::TYPE_NUMBER:
                return Mapping::TYPE_DOUBLE;
            case databox_field::TYPE_STRING:
            case databox_field::TYPE_TEXT:
                return Mapping::TYPE_STRING;
        }

        throw new \InvalidArgumentException(sprintf('Invalid field type "%s", expected "date", "number" or "string".', $type));
    }

    public function __construct($name, $type, array $options = [])
    {
        $this->name = (string) $name;
        $this->type = $type;
        $this->is_searchable   = \igorw\get_in($options, ['searchable'], true);
        $this->is_private      = \igorw\get_in($options, ['private'], false);
        $this->is_facet        = \igorw\get_in($options, ['facet'], false);
        $this->facets_size     = $this->is_facet ? \igorw\get_in($options, ['facets_size'], null) : 0;  // here 0 means "no facets"
        $this->thesaurus_roots = \igorw\get_in($options, ['thesaurus_roots'], null);
        $this->used_by_collections = \igorw\get_in($options, ['used_by_collections'], []);

        Assertion::boolean($this->is_searchable);
        Assertion::boolean($this->is_private);
        Assertion::boolean($this->is_facet);
        if ($this->thesaurus_roots !== null) {
            Assertion::allIsInstanceOf($this->thesaurus_roots, Concept::class);
        }
        Assertion::allScalar($this->used_by_collections);
    }

    public function withOptions(array $options)
    {
        return new self($this->name, $this->type, $options + [
            'searchable' => $this->is_searchable,
            'private' => $this->is_private,
            'facet' => $this->is_facet,
            'facets_size' => $this->facets_size,
            'thesaurus_roots' => $this->thesaurus_roots,
            'used_by_collections' => $this->used_by_collections
        ]);
    }

    public function getName()
    {
        return $this->name;
    }

    public function getIndexField($raw = false)
    {
        return sprintf(
            '%scaption.%s%s',
            $this->is_private ? 'private_' : '',
            $this->name,
            $raw && $this->type === Mapping::TYPE_STRING ? '.raw' : ''
        );
    }

    public function isValueCompatible($value)
    {
        return count(self::filterCompatibleFields([$field], $value)) > 0;
    }

    public static function filterByValueCompatibility(array $fields, $value)
    {
        $is_numeric = is_numeric($value);
        $is_valid_date = RecordHelper::sanitizeDate($value) !== null;
        $filtered = [];
        foreach ($fields as $field) {
            switch ($field->type) {
                case Mapping::TYPE_FLOAT:
                case Mapping::TYPE_DOUBLE:
                case Mapping::TYPE_INTEGER:
                case Mapping::TYPE_LONG:
                case Mapping::TYPE_SHORT:
                case Mapping::TYPE_BYTE:
                    if ($is_numeric) {
                        $filtered[] = $field;
                    }
                    break;
                case Mapping::TYPE_DATE:
                    if ($is_valid_date) {
                        $filtered[] = $field;
                    }
                    break;
                case Mapping::TYPE_STRING:
                default:
                    $filtered[] = $field;
            }
        }
        return $filtered;
    }

    public function getConceptPathIndexField()
    {
        return sprintf('concept_path.%s', $this->name);
    }

    public function getType()
    {
        return $this->type;
    }

    public function getDependantCollections()
    {
        return $this->used_by_collections;
    }

    public function isSearchable()
    {
        return $this->is_searchable;
    }

    public function isPrivate()
    {
        return $this->is_private;
    }

    public function isFacet()
    {
        return $this->is_facet;
    }

    public function getFacetsSize()
    {
        return $this->facets_size;
    }

    public function hasConceptInference()
    {
        return $this->thesaurus_roots !== null;
    }

    public function getThesaurusRoots()
    {
        return $this->thesaurus_roots;
    }

    /**
     * Merge with another field, returning the new instance
     *
     * @param Field $other
     * @return Field
     * @throws MergeException
     */
    public function mergeWith(Field $other)
    {
        if (($name = $other->getName()) !== $this->name) {
            throw new MergeException(sprintf("Fields have different names (%s vs %s)", $this->name, $name));
        }

        // Since mapping is merged between databoxes, two fields may
        // have conflicting names. Indexing is the same for a given
        // type so we reject only those with different types.

        if (($type = $other->getType()) !== $this->type) {
            throw new MergeException(sprintf("Field %s can't be merged, incompatible types (%s vs %s)", $name, $type, $this->type));
        }

        if ($other->isPrivate() !== $this->is_private) {
            throw new MergeException(sprintf("Field %s can't be merged, could not mix private and public fields with same name", $name));
        }

        if ($other->isSearchable() !== $this->is_searchable) {
            throw new MergeException(sprintf("Field %s can't be merged, incompatible searchablility", $name));
        }

        if ($other->isFacet() !== $this->is_facet) {
            throw new MergeException(sprintf("Field %s can't be merged, incompatible facet eligibility", $name));
        }

        $thesaurus_roots = null;
        if ($this->thesaurus_roots !== null || $other->thesaurus_roots !== null) {
            $thesaurus_roots = array_merge(
                (array) $this->thesaurus_roots,
                (array) $other->thesaurus_roots
            );
        }

        $used_by_collections = array_values(
            array_unique(
                array_merge(
                    $this->used_by_collections,
                    $other->used_by_collections
                ),
                SORT_REGULAR
            )
        );

        return $this->withOptions([
            'thesaurus_roots' => $thesaurus_roots,
            'used_by_collections' => $used_by_collections
        ]);
    }
}