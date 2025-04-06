<?php

namespace App\Services\Router;

use App\config\Config;
use App\Exceptions\Router\ClassException;
use App\Exceptions\Router\MethodException;
use App\Exceptions\Router\RouteException;
use App\Utilities\Request\Request;
//use App\Services\View\View;
//use App\Utilities\Request\Request as RequestRequest;

class Router
{

    const BASE_MIDELLWARE = "\\App\\Middlewares\\";
    const BASE_CONTROLLER = "\\App\\Controllers\\";


    public function __construct() {}

    public static function start()
    {
        $request = new Request();
        $currentUri = $request->getCurrentRoute();

        $getAllRoutes = Config::get('web');

        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri_segment = explode('/php_expert', $path);


        if (!(in_array(end($uri_segment), \array_keys($getAllRoutes)))) {

            //view::renderErrorTemplate( 'error' );
            throw new RouteException();
            die();
        }

        [$class, $method] = \explode('@', $getAllRoutes[$currentUri]['target']);
        $className =  self::BASE_CONTROLLER . $class;

        if (!class_exists($className)) {

            throw new ClassException();
            die();
        }


        $fullPathClass =  new $className($request);

        if (!\method_exists($fullPathClass, $method)) {

            throw new  MethodException();
            die();
        }

        $fullPathClass->$method($uri_segments[2] ?? null);
        var_dump('yessss');
    }
}
