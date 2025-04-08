<?php

namespace App\config;

use App\Exceptions\Config\ConfigFileNotFoundException;

class Config
{

    private const CONFIGS = [
        'database' => 'config/database/database.php',
        'web'      => 'config/route/web.php',
        'test'     => 'config/test/testDatabase.php'
    ];

    public static function getFileConfigs(string $string): array
    {

        if (!array_key_exists($string, self::CONFIGS)) {
            throw new ConfigFileNotFoundException();
        }

        $filePath = realpath('src' . DIRECTORY_SEPARATOR . self::CONFIGS[$string]);

        $fileContent = require $filePath;
        return $fileContent;
    }


    public static function get(string $fileName, ?string $key = null): array
    {
        $fileContent = self::getFileConfigs($fileName);

        if (is_null($key)) return $fileContent;
        return $fileContent[$key];
    }
    
}
