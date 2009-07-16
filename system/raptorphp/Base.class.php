<?php if (!defined('RAPTORPHP_ENGINE')) require_once('../die.php');

abstract class Base {
	public static $instance;
	function Base() {
		self::$instance =& $this;
	}
	static function &get_instance() {
		return self::$instance;
	}
}
abstract class Controller extends Base {
	static function load($className) {
		$sep = split('/',$className);
		if (count($sep) < 2)) {
			$appName = $sep[1];
			$conName = $sep[2];
			require_once($_ENV['raptorphp.dir_apps'] . $appName . '/controllers/' . $conName . '.php');
		} else {
			
		}
	}
}	

?>
