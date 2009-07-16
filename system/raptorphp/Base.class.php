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
	function __construct() {
		echo "load...";
	}
	static function load($className) {
		if (count(split('/',$className)) >= 2) {
			$sep = split('/',$className);
			if (count($sep) == 2) {
				$appName = $sep[0];
				$conName = $sep[1];
				$action = "index";
			} else {
				$appName = $sep[1];
				$conName = $sep[2];
				if (isset($sep[3])) $action = $sep[3];
			}
			if (empty($action)) $action = "index";
			if (empty($appName)) ExceptionHandler::ErrorStr("Application request: $conName");
			$fileName = $_ENV['raptorphp.dir_apps'] . $appName . '/controllers/' . $conName . '.php';
			if (file_exists($fileName)) {
				require_once($fileName);
				$ControllerName = ucfirst($appName);
				$Controller = new $ControllerName();
				$Controller->$action();
			}
			else {
				ExceptionHandler::ErrorStr("Controller request: $className is missing.");
			}
		} else {
			ExceptionHandler::ErrorStr("Controller request: $className is missing.");
		}
	}
}	

?>
