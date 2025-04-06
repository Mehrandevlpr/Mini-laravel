<?php

namespace App\Exceptions\Config;

use Exception;

class ConfigFileNotFoundException extends Exception
{

    public function __construct()
    {
        parent::__construct(" Error 04 :  Configuration Was not Found !!! " . date('Y M D'));
    }
}
