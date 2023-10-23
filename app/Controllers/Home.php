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
       // echo htmlentities($this->template->header());
        echo $this->template->navbar();
        echo view("home");
        echo $this->template->footer();
    }
}
