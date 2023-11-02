<?php


use Config\App;
use Libraries\Session;

function usuarioLogado()
{
    $session = new Session();
    $usuario = $session->get("id_cliente");
    return isset($usuario) && !empty($usuario);
}
function base_url($url)
{
    $app = new App();
    $urls = str_split($url);
    if (count($urls) > 0) {
        if ($urls[0] == "/") {
            unset($urls[0]);
        }
        $base_url =  $app->url . implode($urls);
    } else {
        $base_url =  $app->url;
    }


    return $base_url;
}

function view($dir, $data = [])
{
    extract($data);
    ob_start();
    require "app/Views/" . $dir . ".php";


    $conteudoHtml = ob_get_clean();


    return $conteudoHtml;
}

function redirect($uri)
{
    header("Location:" . base_url($uri));
    exit;
}
