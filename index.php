<?php
require_once 'app/Config/Router.php';

$router = new Router();


// Define as rotas do  Sistema

$router->addRoute('teste/(:num)', 'Teste', 'index');


require "vendor/autoload.php";
if (isset($_GET['uri'])) {
    $uri = $_GET['uri'];

    $router->route($uri);
} else {

    require_once 'app/Views/home.php';
}
