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

    public function testConfigDatabaseFileHasCorrectKeyAndValue()
    {

        $config = Config::getFileConfigs('database');
        $this->assertArrayHasKey('type', $config['pdo']);
        $this->assertArrayHasKey('host', $config['pdo']);
        $this->assertArrayHasKey('username', $config['pdo']);
        $this->assertArrayHasKey('password', $config['pdo']);
        $this->assertArrayHasKey('database', $config['pdo']);
    }


    public function testConfigTestFileHasCorrectKeyAndValue()
    {

        $config = Config::getFileConfigs('test');
        $this->assertArrayHasKey('type', $config['pdo_testing']);
        $this->assertArrayHasKey('host', $config['pdo_testing']);
        $this->assertArrayHasKey('username', $config['pdo_testing']);
        $this->assertArrayHasKey('password', $config['pdo_testing']);
        $this->assertArrayHasKey('database', $config['pdo_testing']);
    }
    
    public function testConfigRouteFileHasCorrectKeyAndValue()
    {

        $config = Config::getFileConfigs('web');
        $this->assertArrayHasKey('/', $config);
    }
}
