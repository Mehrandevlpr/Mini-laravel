<?php

namespace App\Utilities\Request;

class Request
{

    private  $request_uri;
    private  $http_host;
    private  $http_user_agent;
    private  $http_accept_encoding;
    private  $http_accept;
    private  $remote_port;
    private  $request_method;
    private  $params;
    private  $document_root;
    private  $query_string;
    private  $server_admin;
    private  $script_name;
    private  $server_software;
    private  $server_porotocol;
    private  $request_scheme;
    private  $remote_add;

    public function __construct()
    {

        //  data clean in url;
        $this->request_uri             =           $this->getCurrentRoute();
        $this->request_method          =           strtolower($_SERVER['REQUEST_METHOD']);
        $this->params                  =           $_REQUEST;
        $this->server_software         =           $_SERVER['SERVER_SOFTWARE'];
        $this->server_porotocol        =           $_SERVER['SERVER_POROTOCOL'] ?? null;
        $this->document_root           =           $_SERVER['DOCUMENT_ROOT'];
        $this->http_accept             =           $_SERVER['HTTP_ACCEPT'];
        $this->query_string            =           $_SERVER['QUERY_STRING'];
        $this->script_name             =           $_SERVER['SCRIPT_NAME'];
        $this->remote_port             =           $_SERVER['REMOTE_PORT'];
        $this->remote_add              =           $_SERVER['REMOTE_ADDR'];
        $this->http_host               =           $_SERVER['HTTP_HOST'];
        $this->http_accept_encoding    =           $_SERVER['HTTP_ACCEPT_ENCODING'];
        $this->http_user_agent         =           $_SERVER['HTTP_USER_AGENT'];
        return $this;
    }

    public function getCurrentRoute()
    {

        $routeWithoutQueryString = strtok($_SERVER['REQUEST_URI'], '?');
        $route = preg_replace('#^php_expert/#', '', $routeWithoutQueryString);
        return str_replace($routeWithoutQueryString, "{$route}", $_SERVER['REQUEST_URI']);
    }

    public function Redirect($url)
    {
        header('Location:' . $url);
        die();
    }
    public function method()
    {
        return $this->request_method;
    }
    public function params()
    {
        return $this->params;
    }
    public function uri()
    {
        return $this->request_uri;
    }
    public function agent()
    {
        return $this->http_user_agent;
    }
    public function ip()
    {
        return $this->remote_add;
    }
    public function __get($name)
    {
        return $this->params[$name] ?? null;
    }
}
