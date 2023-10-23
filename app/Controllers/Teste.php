<?php


namespace Controllers;
use Controllers\BaseController;
use Libraries\Template;

class Teste extends BaseController
{


    public function index($jesus)
    {
        $template = new Template();
        echo "Funcionou o roteamento amigavel $jesus";
    }
}
