<?php

/* RaptorPHP Framework
 * http://www.raptorphp.org
 * Bootstrap
 */

if (!defined('RAPTORPHP_BOOTSTRAP')) define( 'RAPTORPHP_BOOTSTRAP', 'bootstrap.php');

$_ENV['raptorphp.bootstrap'] = str_replace('\\','/',realpath(dirname(__FILE__))) . '/';
$_ENV['raptorphp.url_base'] = str_replace(RAPTORPHP_BOOTSTRAP, '', $_SERVER['PHP_SELF']);
$_ENV['raptorphp.url_request'] = $_SERVER['REQUEST_URI'];
$_ENV['raptorphp.dir_system'] = 'system/';
$_ENV['raptorphp.dir_configs'] = $_ENV['raptorphp.dir_system'] . 'configurations/';

if(strpos($_ENV['raptorphp.url_request'],'/' . RAPTORPHP_BOOTSTRAP)===0) exit;

require_once($_ENV['raptorphp.dir_system'] . 'RaptorPHP.class.php');

RaptorPHP::init();

RaptorPHP::import("raptorphp.Config");
RaptorPHP::import("raptorphp.Base");

RaptorPHP::init_config();

RaptorPHP::Router();

?>
