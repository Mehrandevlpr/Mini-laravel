<?php
$path = __DIR__;
$path = str_replace('bootstrap', '', $path);
define('BASE_PATH', realpath($path) . DIRECTORY_SEPARATOR);
define('STORAGE_PATH', BASE_PATH . 'upload' . DIRECTORY_SEPARATOR);
define('BASE_VIEW_PATH', realpath($path . 'template') . DIRECTORY_SEPARATOR);
define('BASE_URL', 'http://localhost/php_expert');
define('BASE_STORAGE_URL', 'http://localhost/php_expert/template');

include BASE_PATH . 'src/Helper/Functions.php';
