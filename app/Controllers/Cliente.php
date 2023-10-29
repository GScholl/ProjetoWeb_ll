<?php

namespace Controllers;

use Controllers\BaseController;

class Cliente extends BaseController
{

    public function login()
    {

        echo view("login");
    }

    public function registro(){
        echo view("registro"); 
    }
}
