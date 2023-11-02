<?php

namespace Models;

use Config\Database;

class BaseModel extends Database
{

    public function __construct()
    {
    }
    public function getResultArray($query)
    {
        $conn = $this->connect();
        $res = $conn->query($query);
        if ($res->num_rows == 0) return false;

        $result = [];
        while ($row = $res->fetch_assoc()) {
            array_push($result, $row);
        }

        return $result;
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
    public function query($query)
    {
        $conn = $this->connect();
        return $conn->query($query);
    }
    public function getFirst($query)
    {
        $conn = $this->connect();
        $res = $conn->query($query);
        if ($res->num_rows == 0) return false;
        return $res->fetch_object();
    }
    public function getFirstArray($query)
    {
        $conn = $this->connect();
        $res = $conn->query($query);
        if ($res->num_rows == 0) return false;
        return $res->fetch_assoc();
    }
}
