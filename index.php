<?php
require_once 'Config/Router.php';

$router = new Router();


// Define as rotas do  Sistema

$router->addRoute('teste/(:num)', 'Teste', 'index');


if (isset($_GET['uri'])) {
    $uri = $_GET['uri'];

    $router->route($uri);
} else {

    echo "Bem-vindo à página inicial";
}
