<?php
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

defined('SITE_ROOT') ? null : define('SITE_ROOT', 'C:'.DS.'wamp'.DS.'www'.DS.'php_class'.DS.'school'.DS.'joblink');

defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT.DS.'includes');
require_once(LIB_PATH.DS."config.php");
require_once(LIB_PATH.DS."functions.php");
require_once(LIB_PATH.DS."session.php");
require_once(LIB_PATH.DS."database.php");
require_once(LIB_PATH.DS."database_object.php");
require_once(LIB_PATH.DS."pagination.php");

require_once(LIB_PATH.DS."user.php");
require_once(LIB_PATH.DS."company.php");
require_once(LIB_PATH.DS."jobs.php");
require_once(LIB_PATH.DS."approvals.php");
require_once(LIB_PATH.DS."balance.php");
require_once(LIB_PATH.DS."apply.php");

?>