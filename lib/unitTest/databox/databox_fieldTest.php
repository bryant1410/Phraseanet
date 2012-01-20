<?php

require_once __DIR__ . '/../PhraseanetPHPUnitAbstract.class.inc';

/**
 * Test class for databox_field.
 * Generated by PHPUnit on 2011-11-03 at 15:21:28.
 */
class databox_fieldTest extends PhraseanetPHPUnitAbstract
{

  /**
   * @var databox_field
   */
  protected $object;
  protected $databox;
  protected $name;
  protected $id;
  protected static $need_records = 1;

  /**
   * Sets up the fixture, for example, opens a network connection.
   * This method is called before a test is executed.
   */
  public function setUp()
  {
    $this->databox = self::$record_1->get_databox();
    $this->name = 'Field Test';
    
    $this->object = $this->databox->get_meta_structure()->get_element_by_name($this->name);
    
    if(!$this->object instanceof databox_field)
      $this->object = databox_field::create($this->databox, $this->name);
    
    $this->id = $this->object->get_id();
  }

  /**
   * Tears down the fixture, for example, closes a network connection.
   * This method is called after a test is executed.
   */
  public function tearDown()
  {
    if($this->object instanceof databox_field)
      $this->object->delete();
  }

  /**
   * @todo Implement testGet_instance().
   */
  public function testGet_instance()
  {
    $instance = databox_field::get_instance($this->databox, $this->id);
    $this->assertEquals($this->object->get_id(), $instance->get_id());
  }

  /**
   * @todo Implement testSet_databox().
   */
  public function testSet_databox()
  {
    $this->markTestIncomplete(
            'This test has not been implemented yet.'
    );
  }

  /**
   * @todo Implement testGet_connection().
   */
  public function testGet_connection()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
            'This test has not been implemented yet.'
    );
  }

  /**
   * @todo Implement testGet_databox().
   */
  public function testGet_databox()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
            'This test has not been implemented yet.'
    );
  }

  /**
   * @todo Implement testDelete().
   */
  public function testDelete()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
            'This test has not been implemented yet.'
    );
  }

  /**
   * @todo Implement testSave().
   */
  public function testSave()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
            'This test has not been implemented yet.'
    );
  }

  /**
   * @todo Implement testSet_name().
   */
  public function testSet_name()
  {
    $name = 'Eléphant';
    $this->object->set_name($name);
    $this->assertEquals('Elephant', $this->object->get_name());

    $name = '0!èEléphant ';
    $this->object->set_name($name);
    $this->assertEquals('eElephant', $this->object->get_name());

    $name = 'Gaston';
    $this->object->set_name($name);
    $this->assertEquals('Gaston', $this->object->get_name());

    try
    {
      $this->object->set_name('');
      $this->fail();
    }
    catch (Exception $e)
    {
      $this->assertTrue(true, 'test passed');
    }

    try
    {
      $this->object->set_name('éà');
      $this->assertEquals('ea', $this->object->get_name());
    }
    catch (Exception $e)
    {

    }
  }

  /**
   * @todo Implement testLoad_class_from_xpath().
   */
  public function testLoad_class_from_xpath()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
            'This test has not been implemented yet.'
    );
  }

  /**
   * @todo Implement testSet_source().
   */
  public function testSet_source()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
            'This test has not been implemented yet.'
    );
  }

  /**
   * @todo Implement testGet_source().
   */
  public function testGet_source()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
            'This test has not been implemented yet.'
    );
  }

  /**
   * @todo Implement testGet_dces_element().
   */
  public function testGet_dces_element()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
            'This test has not been implemented yet.'
    );
  }

  /**
   * @todo Implement testSet_dces_element().
   */
  public function testSet_dces_element()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
            'This test has not been implemented yet.'
    );
  }

  /**
   * @todo Implement testSet_indexable().
   */
  public function testSet_indexable()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
            'This test has not been implemented yet.'
    );
  }

  /**
   * @todo Implement testSet_readonly().
   */
  public function testSet_readonly()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
            'This test has not been implemented yet.'
    );
  }

  /**
   * @todo Implement testSet_required().
   */
  public function testSet_required()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
            'This test has not been implemented yet.'
    );
  }

  /**
   * @todo Implement testSet_multi().
   */
  public function testSet_multi()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
            'This test has not been implemented yet.'
    );
  }

  /**
   * @todo Implement testSet_report().
   */
  public function testSet_report()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
            'This test has not been implemented yet.'
    );
  }

  /**
   * @todo Implement testSet_type().
   */
  public function testSet_type()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
            'This test has not been implemented yet.'
    );
  }

  /**
   * @todo Implement testSet_tbranch().
   */
  public function testSet_tbranch()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
            'This test has not been implemented yet.'
    );
  }

  /**
   * @todo Implement testSet_separator().
   */
  public function testSet_separator()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
            'This test has not been implemented yet.'
    );
  }

  /**
   * @todo Implement testSet_thumbtitle().
   */
  public function testSet_thumbtitle()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
            'This test has not been implemented yet.'
    );
  }

  /**
   * @todo Implement testSet_regdate().
   */
  public function testSet_regdate()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
            'This test has not been implemented yet.'
    );
  }

  /**
   * @todo Implement testSet_regdesc().
   */
  public function testSet_regdesc()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
            'This test has not been implemented yet.'
    );
  }

  /**
   * @todo Implement testSet_regname().
   */
  public function testSet_regname()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
            'This test has not been implemented yet.'
    );
  }

  /**
   * @todo Implement testIs_regname().
   */
  public function testIs_regname()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
            'This test has not been implemented yet.'
    );
  }

  /**
   * @todo Implement testIs_regdesc().
   */
  public function testIs_regdesc()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
            'This test has not been implemented yet.'
    );
  }

  /**
   * @todo Implement testIs_regdate().
   */
  public function testIs_regdate()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
            'This test has not been implemented yet.'
    );
  }

  /**
   * @todo Implement testGet_thumbtitle().
   */
  public function testGet_thumbtitle()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
            'This test has not been implemented yet.'
    );
  }

  /**
   * @todo Implement testGet_id().
   */
  public function testGet_id()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
            'This test has not been implemented yet.'
    );
  }

  /**
   * @todo Implement testGet_type().
   */
  public function testGet_type()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
            'This test has not been implemented yet.'
    );
  }

  /**
   * @todo Implement testGet_tbranch().
   */
  public function testGet_tbranch()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
            'This test has not been implemented yet.'
    );
  }

  /**
   * @todo Implement testGet_separator().
   */
  public function testGet_separator()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
            'This test has not been implemented yet.'
    );
  }

  /**
   * @todo Implement testIs_indexable().
   */
  public function testIs_indexable()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
            'This test has not been implemented yet.'
    );
  }

  /**
   * @todo Implement testIs_readonly().
   */
  public function testIs_readonly()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
            'This test has not been implemented yet.'
    );
  }

  /**
   * @todo Implement testIs_required().
   */
  public function testIs_required()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
            'This test has not been implemented yet.'
    );
  }

  /**
   * @todo Implement testIs_multi().
   */
  public function testIs_multi()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
            'This test has not been implemented yet.'
    );
  }

  /**
   * @todo Implement testIs_distinct().
   */
  public function testIs_distinct()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
            'This test has not been implemented yet.'
    );
  }

  /**
   * @todo Implement testIs_report().
   */
  public function testIs_report()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
            'This test has not been implemented yet.'
    );
  }

  /**
   * @todo Implement testGet_name().
   */
  public function testGet_name()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
            'This test has not been implemented yet.'
    );
  }

  /**
   * @todo Implement testGet_metadata_source().
   */
  public function testGet_metadata_source()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
            'This test has not been implemented yet.'
    );
  }

  /**
   * @todo Implement testGet_metadata_namespace().
   */
  public function testGet_metadata_namespace()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
            'This test has not been implemented yet.'
    );
  }

  /**
   * @todo Implement testGet_metadata_tagname().
   */
  public function testGet_metadata_tagname()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
            'This test has not been implemented yet.'
    );
  }

  /**
   * @todo Implement testIs_on_error().
   */
  public function testIs_on_error()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
            'This test has not been implemented yet.'
    );
  }

  /**
   * @todo Implement testCreate().
   */
  public function testCreate()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
            'This test has not been implemented yet.'
    );
  }

  /**
   * @todo Implement test__sleep().
   */
  public function test__sleep()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
            'This test has not been implemented yet.'
    );
  }

  /**
   * @todo Implement test__wakeup().
   */
  public function test__wakeup()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
            'This test has not been implemented yet.'
    );
  }

  /**
   * @todo Implement testGet_cache_key().
   */
  public function testGet_cache_key()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
            'This test has not been implemented yet.'
    );
  }

  /**
   * @todo Implement testGet_data_from_cache().
   */
  public function testGet_data_from_cache()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
            'This test has not been implemented yet.'
    );
  }

  /**
   * @todo Implement testSet_data_to_cache().
   */
  public function testSet_data_to_cache()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
            'This test has not been implemented yet.'
    );
  }

  /**
   * @todo Implement testDelete_data_from_cache().
   */
  public function testDelete_data_from_cache()
  {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
            'This test has not been implemented yet.'
    );
  }

}

?>
