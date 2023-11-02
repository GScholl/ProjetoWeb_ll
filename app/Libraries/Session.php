<?php

namespace Libraries;

use Controllers\BaseController;

class Session extends BaseController
{



    public function set(string $key, $value = null)
    {
        $_SESSION[$key] = $value;
    }

    public function get(string $key)
    {

        if (isset($_SESSION[$key])) {

            return $_SESSION[$key];
        }

        return false;
    }
    public function delete(string $key){
        unset($_SESSION[$key]);
    }
}
