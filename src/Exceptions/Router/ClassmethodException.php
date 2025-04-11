<?php

namespace App\Exceptions\Router;

use Exception;

class ClassMethodException extends Exception
{

    public function __construct()
    {
        throw new exception(" Error 02 :  This class has not this method you invoke !!! " . date('Y M D'));
    }
}
