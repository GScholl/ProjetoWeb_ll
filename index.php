<?php
require_once 'Routes.php';

$router = new Routes();


// Define as rotas do  Sistema

$router->addRoute('teste', 'Teste', 'index');


if (isset($_GET['uri'])) {
    $uri = $_GET['uri'];

    $router->route($uri);
} else {

    echo "Bem-vindo à página inicial";
}
