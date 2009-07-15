<?php if (!defined('RAPTORPHP_ENGINE')) require_once('../die.php');

abstract class Config {
	const DEVELOPMENT = 0;
	const PRODUCTION = 1;
	const TEST = 2;
	public static $mode = self::PRODUCTION;
	public static $appsDir = '';
	public static $pluginsDir = '';
	public static $helpersDir = '';
	public static $mainApp = '';
	public static $database = '';
	public static $disabledApps = array();
	static function init() {
		if (self::$mode == self::PRODUCTION) self::$useCache = true;
		$_ENV['raptorphp.dir_apps'] = self::$appsDir;
		//date_default_timezone_set();
	}
	static function load($config = array()) {
		self::$mode = $config['mode'];
		self::$appsDir = $config['appsDir'];
		self::$pluginsDir = $config['pluginsDir'];
		self::$helpersDir = $config['helpersDir'];
		self::$mainApp = $config['mainApp'];
		self::$disabledApps = $config['disabledApps'];
		self::$database = $config['database'];
		self::init();
	}
}
?>
