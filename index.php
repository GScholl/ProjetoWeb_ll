

<?php
require "vendor/autoload.php";
require_once 'app/Config/Router.php';
require_once 'app/helpers/helper.php';

use Libraries\Session;

session_start();
$router = new Router();



// Define as rotas do  Sistema
$router->addRoute(" ", "Home", "index");
$router->addRoute("login", "Cliente", "login");
$router->addRoute("logout", "Cliente", "logout");
$router->addRoute("autenticar", "Cliente", "autenticar");
$router->addRoute("registrar-se", "Cliente", "registro");
$router->addRoute("registrar", "Cliente", "cadastrarCliente");
$router->addRoute('adicionar-produto/(:num)', 'Carrinho', 'adicionaProduto');
$router->addRoute('remover-produto/(:num)', 'Carrinho', 'removeProduto');
$router->addRoute('meu-carrinho', 'Carrinho', 'carrinho');
$router->addRoute('finalizar-compra', 'Carrinho', 'finalizarCompra');




$router->route((isset($_GET['uri']) ? $_GET['uri'] : " "));
