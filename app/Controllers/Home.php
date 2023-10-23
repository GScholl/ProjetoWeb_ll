<?php


namespace Controllers;

use Controllers\BaseController;
use Libraries\Template;

class Home extends BaseController
{

    public function __construct()
    {
        $this->template = new Template();
    }
    public function index()
    {
        echo $this->template->navbar().view("home").$this->template->footer();

     

       
    }
}
