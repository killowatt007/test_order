<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

define('EXE', 1);
define('ROOT', $_SERVER['DOCUMENT_ROOT']);

define('BD_NAME', 'mirdomhx_test');
define('BD_USER', 'mirdomhx_test');
define('BD_PASS', '6p3lK&No');
define('BD_HOST', 'localhost');

include ROOT . '/lib/router.php';

$router = new \lib\Router();
$router->route();
