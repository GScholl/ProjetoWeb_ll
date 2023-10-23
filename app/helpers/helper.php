<?php

use Config\App;


function view($dir, $data = [])
{
    extract($data);
    ob_start(); 
    require "app/Views/" . $dir . ".php";

    
    $conteudoHtml = ob_get_clean();

   
    return $conteudoHtml;
}

function base_url($url)
{
    $app = new App();
    $urls = str_split($url);
    if ($urls[0] == "/") {
        unset($urls[0]);
    }
    return $app->url . implode($urls);
}
