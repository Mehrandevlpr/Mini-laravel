<?php


$path = __DIR__;
$path = str_replace('bootstrap', '', $path);
define('BASE_PATH', realpath($path) . DIRECTORY_SEPARATOR);

define('STORAGE_PATH', BASE_PATH . 'upload' . DIRECTORY_SEPARATOR);

define('BASE_VIEW_PATH', realpath($path . 'template') . DIRECTORY_SEPARATOR);

#errors
error_reporting(E_ALL);
ini_set('display_errors', 1);



#Dotenv configurations
include_once BASE_PATH . "vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(BASE_PATH);
$dotenv->load();

#functional helper
include BASE_PATH . 'helper/Functions.php';

#routes rules
include BASE_PATH . 'routes/web.php';
