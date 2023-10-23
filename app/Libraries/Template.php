<?php

namespace Libraries;

use Controllers\BaseController;

class Template extends BaseController
{



    public function header($ExtrasCSS = [])
    {
        $ImportsCss = [
            "public/bootstrap/css/bootstrap.min.css"

        ];
        array_push($ImportsCss, $ExtrasCSS);
        $dados['css_files'] = $ImportsCss;
        return view("templates/header", $dados);
    }
    public function navbar()
    {

        return view("templates/navbar");
    }


    public function footer($ExtrasJS = [])
    {
        $ImportsJs = [
            "public/bootstrap/css/bootstrap.min.js"

        ];
        array_push($ImportsJs, $ExtrasJS);
        $dados['css_files'] = $ImportsJs;
        return view("templates/footer",$dados);
    }
}
