<?php 
set_error_handler("RaptorPHP::ErrorHandler");

abstract class RaptorPHP {
	static function init() {
		define('RAPTORPHP_ENGINE', true);
	}
	static function ErrorHandler($errno, $errstr, $errfile, $errline) {
		define("RAPTORPHP_ERROR", true);
		$error = array( 'ErrorNo'   => $errno,
				'ErrorStr'  => $errstr,
				'ErrorFile' => $errfile,
				'ErrorLine' => $errline);
		ExceptionHandler::Error($error);
	}
	static function import($file) {
		$file = str_replace('.','/',$file);
		require_once($file.'.class.php');
	}
	static function init_config($file='config.php') {
		require_once($_ENV['raptorphp.dir_configs'] . $file);
		Config::load($config);
	}
	static function Router() {
		$request = $_ENV['raptorphp.url_request'];
		if ($request == "/") $request = Config::get_value('mainApp');
		$request = str_replace('.','/',$request);
		Controller::load($request);
	}
}
?>
