<?php


namespace Controllers;

use Controllers\BaseController;
use Libraries\Template;

class Teste extends BaseController
{

    public function __construct()
    {
        $this->template = new Template();
    }
    public function index($jesus)
    {

        $dados = ["pinto" => "Teste"];
        echo $this->template->header();
       
    }
}
