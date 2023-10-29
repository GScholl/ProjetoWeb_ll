<?php

namespace Models;

use Models\BaseModel;

class ProdutoModel extends  BaseModel
{

    public function getProdutos(){
        $query = "SELECT * FROM produto";

        return $this->getResult($query);
    }
}