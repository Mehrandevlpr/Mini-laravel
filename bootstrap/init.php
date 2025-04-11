<?php


//session_start();

include_once "bootstrap.php";

include_once BASE_PATH . "vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(BASE_PATH);
$dotenv->load();




//$dbh = new Medoo(configs('medoo'));