<?php

namespace App\config;

use App\Exceptions\Config\ConfigFileNotFoundException;

class Config
{


    public static function getFileConfigs(string $string): array
    {
        $filePath = realpath('src' . DIRECTORY_SEPARATOR . "config/{$string}.php");

        if (!$filePath) {
            throw new ConfigFileNotFoundException();
        }

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
