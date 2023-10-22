<?php
class Routes
{
    private $routes = [];

    public function addRoute($route, $controller, $method)
    {
        $this->routes[$route] = [
            'controller' => $controller,
            'method' => $method
        ];
    }

    public function route($uri)
    {
        if (isset($this->routes[$uri])) {
            $route = $this->routes[$uri];
            $controllerName = $route['controller'];
            $methodName = $route['method'];

            require_once $controllerName . '.php';
            $controller = new $controllerName();
            $controller->$methodName();
        } else {
           
            echo "Rota não encontrada";
        }
    }
}
