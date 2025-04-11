<?php

namespace App\Exceptions\Router;

use Exception;

class RouteException extends Exception
{

    public function __construct()
    {
        throw new exception(" Error 03 :  Route Was not Found !!! " . date('Y M D'));
    }
}
