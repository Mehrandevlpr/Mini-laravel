<?php

namespace Tests\Unit\ConfigTest;

use PHPUnit\Framework\TestCase;
use App\config\Config;
use App\Exceptions\Config\ConfigFileNotFoundException;

class ConfigTest extends TestCase
{


    public function testIfWebConfigReturnArray(): void
    {
        $config = Config::getFileConfigs('database');
        $this->assertIsArray($config);
    }

    public function testConfigFileThrowsValidException(): void
    {

        $this->expectException(ConfigFileNotFoundException::class);
        Config::getFileConfigs('dummy');
    }
}
