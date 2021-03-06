<?php
/**
 * XXX mysfw_view::reveal() tests to be completed
 */

 require_once '_unit_tests/substructure/mysfw_core_Test.php';

 require_once 'substructure/mysfw_dna.interface.php';
 require_once 'substructure/mysfw_view.interface.php';
 require_once 'substructure/mysfw_core.class.php';

 require_once 'modules/view/view.class.php';

 class mysfw_view_Test extends mysfw_core_Test {

  public function setUp() {
   $this->x = new  mysfw_view;
  }

  public function test_init() {
   $this->assertNull($this->x->get('gni'));
   return $this->x;
  }

  /**
   * @depends test_init
   */
  public function test_set($v) {
   $v->set('gni', 'gna');
   $this->assertEquals('gna', $v->get('gni'));
   return $v;
  }

  /**
   * @depends test_set
   */
  public function test_reset($v) {
   $v->set('gni', 'gno');
   $this->assertEquals('gno', $v->get('gni'));
   return $v;
  }

  /**
   * @depends test_reset
   */
  public function test_reinit($v) {
   $v->set('gni', null);
   $this->assertNull($v->get('gni'));
   return $v;
  }

  /**
   */
  public function test_set_all() {
   $d = array('un' => 'un', 'deux' => 'deux');
   $this->x->set_all($d);
   $this->assertEquals($this->x->get_all(), $d);
  }



  /**
   * @expectedException PHPUnit_Framework_Error
   */
  public function test_error_on_non_existing_tmpl() {
   $this->x->reveal('non/existing/tmpl');
  }

 }

?>
