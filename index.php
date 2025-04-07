<?php



error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once "bootstrap/init.php";

use App\Services\Router\Router;


Router::start();
