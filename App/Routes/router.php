<?php

class Router
{
    protected $routes = [];

    public function routerMethod($method, $uri, $controller, $methodName)
    {
        $this->routes[$method][$uri] = ['controller' => $controller, 'method' => $methodName];
    }

    public function get($uri, $controller, $methodName)
    {
        $this->routerMethod("GET", $uri, $controller, $methodName);
    }

    public function post($uri, $controller, $methodName)
    {
        $this->routerMethod("POST", $uri, $controller, $methodName);
    }

    public function route($uri, $method)
    {
        if (isset($this->routes[$method][$uri])) {
            $controllerName = $this -> routes[$method][$uri]['controller'];
            $method = $this -> routes[$method][$uri]['method'];
            require basePathController($controllerName);
            $controller = new $controllerName();
            $controller->$method();
        } else {
            require basePath('App/Error/Error.php');
            exit;
        }
    }

}