<?php

use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Translation\TranslatorInterface;

class Bridge_Api_Apitest_Containers implements Bridge_Api_ContainerInterface
{
    public $id;
    public $type;

    public function __construct()
    {

    }

    public function get_created_on()
    {

    }

    public function get_description()
    {

    }

    public function get_id()
    {
        return $this->id;
    }

    public function get_thumbnail($width = 120, $height = 90)
    {

    }

    public function get_title()
    {

    }

    public function get_type()
    {
        return $this->type;
    }

    public function get_updated_on()
    {

    }

    public function get_url()
    {

    }

    public function get_category()
    {

    }

    public function is_private()
    {

    }

    public function get_rating()
    {

    }
}

class Bridge_Api_Apitest_Element implements Bridge_Api_ElementInterface
{
    public $id = 42;
    public $type = 'type';

    public function __construct()
    {

    }

    public function get_category()
    {

    }

    public function get_created_on()
    {

    }

    public function get_description()
    {

    }

    public function get_duration()
    {

    }

    public function get_id()
    {
        return $this->id;
    }

    public function get_rating()
    {

    }

    public function get_thumbnail()
    {

    }

    public function get_title()
    {

    }

    public function get_type()
    {
        return $this->type;
    }

    public function get_updated_on()
    {

    }

    public function get_url()
    {

    }

    public function get_view_count()
    {

    }

    public function is_private()
    {

    }
}

class Bridge_Api_Apitest extends Bridge_Api_Abstract implements Bridge_Api_Interface
{
    const AUTH_TYPE = 'None';

    public static $hasError = false;
    public static $hasException = false;

    protected function initialize_transport()
    {

    }

    protected function set_auth_params()
    {

    }

    protected function set_transport_authentication_params()
    {

    }

    public function get_terms_url()
    {
        return 'http://example.com/terms.html';
    }

    /**
     *
     * @return Array
     */
    public function connect()
    {
        return ['auth_token'    => 'kikoo', 'refresh_token' => 'kooki'];
    }

    /**
     *
     * @return Bridge_Api_Interface
     */
    public function reconnect()
    {
        return parent::reconnect();
    }

    /**
     *
     * @return Bridge_Api_Interface
     */
    public function disconnect()
    {
        return parent::disconnect();
    }

    /**
     *
     * @return boolean
     */
    public function is_connected()
    {
        return parent::is_connected();
    }

    /**
     *
     * @return Bridge_Api_Interface
     */
    public function set_locale($locale)
    {

    }

    /**
     *
     * @return string
     */
    public function get_name()
    {
        return 'Youtube';
    }

    /**
     *
     * @return string
     */
    public function get_icon_url()
    {

    }

    /**
     *
     * @return string
     */
    public function get_image_url()
    {

    }

    /**
     *
     * @return string
     */
    public function get_url()
    {

    }

    /**
     *
     * @return string
     */
    public function get_infos()
    {

    }

    public function get_object_class_from_type($type)
    {
        switch ($type) {
            case $this->get_default_element_type() :
                return Bridge_Api_Interface::OBJECT_CLASS_ELEMENT;
                break;
            case $this->get_default_container_type() :
                return Bridge_Api_Interface::OBJECT_CLASS_CONTAINER;
                break;
        }
    }

    public function get_default_element_type()
    {
        return 'video';
    }

    public function get_default_container_type()
    {
        return 'playlist';
    }

    public function get_element_types()
    {

    }

    public function get_container_types()
    {

    }

    public function get_element_from_id($element_id, $object)
    {
        $element = new Bridge_Api_Apitest_Element();
        $element->id = $element_id;
        $element->type = $object;

        return $element;
    }

    public function get_container_from_id($element_id, $object)
    {
        $container = new Bridge_Api_Apitest_Containers();
        $container->id = $element_id;
        $container->type = $object;

        return $container;
    }

    public function get_category_list()
    {

    }

    public function get_user_name()
    {
        return "coucou";
    }

    public function get_user_id()
    {
        return 'kirikoo';
    }

    public function list_elements($type, $offset_start = 0, $quantity = 10)
    {
        $element_collection = new Bridge_Api_ElementCollection();
        $i = 0;
        while ($i < 5) {
            $element_collection->add_element(new Bridge_Api_Apitest_Element());
            $i ++;
        }

        return $element_collection;
    }

    public function list_containers($type, $offset_start = 0, $quantity = 10)
    {
        $container_collection = new Bridge_Api_ContainerCollection();
        $i = 0;
        while ($i < 5) {
            $container_collection->add_element(new Bridge_Api_Apitest_Containers());
            $i ++;
        }

        return $container_collection;
    }

    public function update_element($object, $object_id, Array $datas)
    {

    }

    public function create_container($container_type, \Symfony\Component\HttpFoundation\Request $request)
    {
        if (self::$hasException) {
            self::$hasException = false;
            throw new \Exception("une erreur");
        }
    }

    public function add_element_to_container($element_type, $element_id, $destination, $container_id)
    {
        if (self::$hasException) {
            self::$hasException = false;
            throw new \Exception("une erreur");
        }
    }

    public function delete_object($object, $object_id)
    {
        if (self::$hasException) {
            self::$hasException = false;
            throw new \Exception("une erreur");
        }
    }

    /**
     *
     * @return Closure
     */
    public function acceptable_records()
    {
        $func = function($record) {
            return true;
        };

        return $func;
    }

    public function get_element_status(Bridge_Element $element)
    {

    }

    public function map_connector_to_element_status($status)
    {

    }

    public function get_error_message_from_status($connector_status)
    {

    }

    public function upload(record_adapter $record, array $options = [])
    {

    }

    public function is_valid_object_id($object_id)
    {

    }

    public function is_configured()
    {
        return true;
    }

    public function check_upload_constraints(array $datas, record_adapter $record)
    {
        if (self::$hasError) {
            self::$hasError = false;

            return ['title' => 'too long'];
        }

        return [];
    }

    public function get_upload_datas(\Symfony\Component\HttpFoundation\Request $request, record_adapter $record)
    {
        return [];
    }

    public function is_multiple_upload()
    {

    }

    public function check_update_constraints(Array $datas)
    {
        if ( ! self::$hasError) {
            if (self::$hasException) {
                self::$hasException = false;
                throw new \Exception('une erreur');
            }

            return [];
        } elseif (self::$hasError) {
            self::$hasError = false;

            return ['title' => 'too long'];
        }
    }

    public function get_update_datas(\Symfony\Component\HttpFoundation\Request $request)
    {
        return [];
    }
}

class Bridge_Api_Auth_None extends Bridge_Api_Auth_Abstract implements Bridge_Api_Auth_Interface
{

    public function connect($param)
    {

    }

    public function parse_request_token()
    {

    }

    public function reconnect()
    {
        $this->settings->set('access_token', 'biloute');
    }

    public function disconnect()
    {
        $this->settings->set('auth_token', null);
    }

    public function is_connected()
    {
        return $this->settings->get('auth_token', null) !== null;
    }

    public function get_auth_url(Array $supp_parameters = [])
    {
        return 'kameamea';
    }

    public function get_auth_signatures()
    {

    }

    public function set_parameters(Array $parameters)
    {

    }
}
