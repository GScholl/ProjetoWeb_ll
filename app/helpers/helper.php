<?php

use Config\App;


function view($dir, $data = [])
{
    extract($data);
    require "app/Views/" . $dir . ".php";
    return;
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
