<?php
class Router
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

        $uris =  explode('/', $uri);
        $parameters = [];
        foreach ($uris as  $index => $url) {


            if (is_numeric($url)) {
                array_push($parameters, $url);
                $uris[$index] = "(:num)";
            }
        }

        $uri = implode("/", $uris);


        if (isset($this->routes[$uri])) {
            $route = $this->routes[$uri];
            $controllerName = $route['controller'];
            $methodName = $route['method'];

            require_once 'Controllers/'.$controllerName . '.php';
            $controller = new $controllerName();
            call_user_func_array(array($controller, $methodName), $parameters);
        } else {

            require_once "Views/errors/error404.php";
        }
    }
}
