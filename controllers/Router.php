<?php

namespace controllers;

//use controllers\AutoRouter;

class Router
{
    private AutoRouter $router;

    public function __construct()
    {
        $this->router = new AutoRouter();
    }

    public function addRoute(string $uri, string $handler, string $method = 'GET'): void
    {
        $this->router->map($method, $uri, $handler);
    }

    public function getRoute(): ?array
    {
        $routeInfo = $this->router->match();
        if ($routeInfo) {
            return [
                'uri' => $routeInfo['target'],
                'handler' => $routeInfo['name'],
                'method' => $routeInfo['method']
            ];
        }

        return null;
    }

    public function run(): void
    {
        $route = $this->getRoute();
        if ($route) {
            list($controllerClass, $method) = explode('@', $route['handler']);
            $controller = new $controllerClass();
            $controller->{$method}();
        } else {
            exit('Маршрут не найден');
        }
    }
}
