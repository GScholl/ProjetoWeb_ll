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
}
