<?php


namespace Controllers;

use Models\BaseModel; 
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
        $db = new BaseModel();

        print_r($db->getFirst("SELECT * FROM produto"));
        // echo htmlentities($this->template->header());
        echo $this->template->navbar();
        echo view("home");
        echo $this->template->footer();
    }
}
