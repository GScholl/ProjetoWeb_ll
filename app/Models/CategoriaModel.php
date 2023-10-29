<?php

namespace Models;

use Models\BaseModel;

class CategoriaModel extends BaseModel
{
    public function getCategorias()
    {


        $query = "SELECT 
                        id,
                        nome, 
                        (select 
                            count(id) 
                        FROM 
                            produto 
                        WHERE 
                            id_categoria = categoria.id
                            ) as produtosCategoria 
                  FROM 
                    categoria";

        return $this->getResult($query);
    }
}
