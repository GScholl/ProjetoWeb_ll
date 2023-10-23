<?php

namespace Controllers;

class BaseController
{

    public function view($dir,$data = [])
    {
        extract($data);
        require $dir;
        return;
    }
}
