<?php

namespace Models;

use Models\BaseModel;

class ProdutoModel extends  BaseModel
{

    public function getProdutos($pesquisa = null)
    {

        $pesquisa = !is_null($pesquisa) ?  "WHERE titulo LIKE '%$pesquisa%'" : "";
        $query = "SELECT * FROM produto $pesquisa";

        return $this->getResult($query);
    }
    public function getProdutoById($idProduto)
    {
        $query = "SELECT * FROM produto WHERE id = $idProduto";

        return $this->getFirstArray($query);
    }
}
