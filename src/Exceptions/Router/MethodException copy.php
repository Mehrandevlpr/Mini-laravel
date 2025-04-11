<?php

namespace App\Exceptions\Router;

use Exception;

class MethodException extends Exception
{

    public function __construct()
    {
        throw new exception(" Error 02 :  Method Was not Found for this route!!! " . date('Y M D'));
    }
}
