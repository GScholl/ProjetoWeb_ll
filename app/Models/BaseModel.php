<?php

namespace Models;

use Config\Database;

class BaseModel extends Database
{

    public function __construct()
    {
    }


    public function getResult($query)
    {
        $conn = $this->connect();
        $res = $conn->query($query);
        if ($res->num_rows == 0) return false;

        $result = [];
        while ($row = $res->fetch_object()) {
            array_push($result, $row);
        }

        return $result;
    }
    public function getFirst($query)
    {
        $conn = $this->connect();
        $res = $conn->query($query);
        if ($res->num_rows == 0) return false;
        return $res->fetch_object();
    }
}
