

<?php
require "vendor/autoload.php";
require_once 'app/Config/Router.php';
require_once 'app/helpers/helper.php';
require_once 'app/helpers/helperBaseUrl.php';

$router = new Router();


// Define as rotas do  Sistema
$router->addRoute(" ", "Home", "index");
$router->addRoute('teste/(:num)', 'Teste', 'index');




$router->route((isset($_GET['uri']) ? $_GET['uri'] : " "));
