<?php

namespace App\Exceptions\Router;

use Exception;

class ClassException extends Exception
{

    public function __construct()
    {
        throw new exception(" Error 01 :  Controller Was not Found !!! " . date('Y M D'));
    }
}
