<?php

namespace App\Services\Router;

class Route
{

    private static $routes = [];

    public static function  add($methods, $uri, $action = null)
    {
        $methods = is_array($methods) ? $methods : [$methods];
        self::$routes[] = ['methods' => $methods, 'uri' => $uri, 'action' => [$action]];
    }

    public static function  routes()
    {
        return self::$routes;
    }

    public static function  get($methods, $uri, $action = null)
    {
        return self::add($methods, $uri, $action);
    }
    public static function  post($methods, $uri, $action = null)
    {
        return self::add($methods, $uri, $action);
    }
    public static function  put($methods, $uri, $action = null)
    {
        return self::add($methods, $uri, $action);
    }
    public static function  delete($methods, $uri, $action = null)
    {
        return self::add($methods, $uri, $action);
    }
    public static function  prefix() {}
}
