<?php

function view($dir, $data = [])
{
    extract($data);
    ob_start(); 
    require "app/Views/" . $dir . ".php";

    
    $conteudoHtml = ob_get_clean();

   
    return $conteudoHtml;
}


