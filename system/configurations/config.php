<?php if (!defined('RAPTORPHP_ENGINE')) require_once('./system/die.php');

define('DEVELOPMENT', 0);
define('PRODUCTION', 1);
define('TEST', 2);

// MODE:  DEVELOPMENT, PRODUCTION, TEST

$config['mode'] = DEVELOPMENT;

$config['appsDir'] =  'applications/';
$config['pluginsDir'] = 'plugins/';
$config['helpersDir']= 'helpers/';

$config['mainApp'] = "home.welcome";
$config['disabledApps'] =  array( // 'welcome.WelcomeApplication' 
				);
$config['database'] = "'mysql:host=localhost:dbname=DBNAME', 'USERNAME', 'PASS'";

?>
