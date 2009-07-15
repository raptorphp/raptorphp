<?php

/* RaptorPHP Framework
 * http://www.raptorphp.org
 */

define( 'RAPTORPHP_BOOTSTRAP', 'bootstrap.php' );
define( '_INDEX', 'index.php' );
define( '_SELF', $_SERVER['PHP_SELF'] );
define( '_BASE', substr(_SELF, 0, strpos(_SELF,_INDEX) + strlen(_INDEX)) );

$_SERVER['PHP_SELF'] = _BASE . RAPTORPHP_BOOTSTRAP;
$_SERVER['REQUEST_URI'] = substr( $_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'], _INDEX) + strlen(_INDEX) );

require_once(RAPTORPHP_BOOTSTRAP);

?>
