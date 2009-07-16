<?php if (!defined('RAPTORPHP_ENGINE')) require_once('../die.php');

abstract class Base {
	private static $instance;
	function Base() {
		self::$instance =& $this;
	}
	static function &get_instance() {
		return self::$instance;
	}
}
abstract class Controller extends Base {
	static function init() {
		print_r(parent::Base());
	}
}	

?>
