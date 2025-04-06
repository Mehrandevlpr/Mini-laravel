<?php

use App\Services\Router\Router;


error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once "bootstrap/init.php";


Router::start();