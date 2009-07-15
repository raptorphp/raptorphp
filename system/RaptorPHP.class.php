<?php 


abstract class RaptorPHP {
	static function init() {
		define('RAPTORPHP_ENGINE', true);
	}
	static function import($file) {
		$file = str_replace('.','/',$file);
		require_once($file.'.class.php');
	}
	static function Config($file='./config.php') {
		require_once($file);
		Config::load($config);
	}
	static function Router() {
		$request = $_ENV['raptorphp.url_request'];
		echo "Router started..";
		try {
			$path = "./applications/" . $request . ".php";
			require_once($path);
			Controller::init();
		}
		catch (Exception $exception) {
			die("Error: $exception");
			echo "Reading $request";
		}
	}
}
?>
