<?php

use Config\App;

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
