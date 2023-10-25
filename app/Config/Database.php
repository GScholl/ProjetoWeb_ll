<?php

namespace Config;

use Config\App;

class Database extends App
{
    private $host = "localhost";
    private $database = "projeto_web2";
    private $user = "root";
    private $password = "";

    public function connect()
    {


        $conn = new \Mysqli($this->host, $this->user, $this->password, $this->database);

        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
           
        }

        return $conn;
    }
}
