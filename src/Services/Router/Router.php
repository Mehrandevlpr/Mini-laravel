<?php

namespace App\Services\Router;


use App\Exceptions\Router\ClassException;
use App\Exceptions\Router\ClassMethodException;
use App\Exceptions\Router\RouteException;
use App\Services\Router\Route;
use App\Services\View\View;
use App\Utilities\Request\Request;


class Router
{

    const BASE_MIDELLWARE = "\\App\\Middlewares\\";
    const BASE_CONTROLLER = "\\App\\Controllers\\";

    private $request;
    private $current_route;
    private $routes = [];


    public function __construct()
    {
        $this->request = new Request();
        $this->routes  = Route::routes();
        $this->current_route = $this->findRoute($this->request) ?? null;
        return $this;
    }

    private function findRoute(Request $request)
    {

        foreach ($this->routes as $route) {
            if (in_array($request->method(), $route['methods']) && $request->uri() === $route['uri'])
                return $route;
        }
        return null;
    }

    public function run()
    {

        #dispatch to page not found view
        if (is_null($this->current_route)) {
            $this->dispatch404();
            die();
        };

        $this->dispatch();
    }

    private function dispatch404()
    {

        View::renderErrorTemplate('404');
        throw new RouteException();
        exit();
    }

    private function dispatch()
    {

        $action = $this->current_route['action'][0];

        #is callable action
        if (is_callable($action)) {
            $action();
        }

        #is string action
        if (is_string($action))
            $action = \explode('@', $action);

        #is string action
        if (is_array($action)) {

            $className =  self::BASE_CONTROLLER . $action[0];
            $method = $action[1];

            if (!class_exists($className))
                throw new ClassException();
            $controller = new $className();

            if (!method_exists($controller, $method))
                throw new ClassMethodException();
            $controller->{$method}();
        }
    }
}
