<?php

namespace Models;

use Models\BaseModel;

class CategoriaModel extends BaseModel
{
    public function getCategorias($pesquisa = null)
    {
        $pesquisa = !is_null($pesquisa) ?  "AND titulo LIKE '%$pesquisa%'" :"";

        $query = "SELECT 
                        id,
                        nome, 
                        (select 
                            count(id) 
                        FROM 
                            produto 
                        WHERE 
                            id_categoria = categoria.id
                        $pesquisa
                            ) as produtosCategoria 
                  FROM 
                    categoria";

        return $this->getResult($query);
    }
}
