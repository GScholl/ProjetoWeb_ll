<?php

namespace Models;

use Models\BaseModel;

class ClientesModel extends BaseModel
{

    public function getCliente($email)
    {
        $query = "SELECT * FROM clientes WHERE email = '$email'";

        $row = $this->getFirst($query);
        if (!empty($row)) {
            return $row;
        } else {

            return false;
        }
    }
    public function registraCliente($cliente)
    {
        extract($cliente);
        $query = "INSERT 
                        INTO 
                            clientes 
                            (
                                nome, 
                                sobrenome, 
                                email,
                                senha
                                ) 
                        VALUES
                            (
                                '$nome',
                                '$sobrenome',
                                '$email',
                                '$senha'
                            )";
        return $this->query($query);
    }
}
