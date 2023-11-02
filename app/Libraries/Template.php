<?php

namespace Libraries;

use Controllers\BaseController;
use Libraries\Session;

class Template extends BaseController
{



    public function navbar($ExtrasCSS = [])
    {
        $ImportsCss = [
            "/public/bootstrap/css/bootstrap.min.css",
            "/public/css/style.css",
           "public/fontawesome/css/fontawesome.css",
           "public/fontawesome/css/brands.css",
           "public/fontawesome/css/solid.css"

        ];
        array_merge($ImportsCss, $ExtrasCSS);
        $dados['session'] = new Session();
        $dados['css_files'] = $ImportsCss;

        return view("templates/navbar",$dados);
    }


    public function footer($ExtrasJS = [])
    {
        $ImportsJs = [
            "/public/bootstrap/js/bootstrap.bundle.min.js",
            "/public/js/jquery/jquery.min.js",
            "/public/js/script.js"

        ];
        array_push($ImportsJs, $ExtrasJS);
        $dados['css_files'] = $ImportsJs;
        return view("templates/footer",$dados);
    }
}
