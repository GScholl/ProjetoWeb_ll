<?php

namespace Models;

use Models\BaseModel;

class ProdutoModel extends  BaseModel
{

    public function getProdutos($pesquisa = null)
    {

        $pesquisa = !is_null($pesquisa) ?  "WHERE titulo LIKE '%$pesquisa%'" : "";
        $query = "SELECT
                        id,
                        titulo,
                        descricao,
                        id_categoria,
                        valor,
                        (
                         select 
                            url 
                            from 
                                fotos_produto 
                            WHERE 
                                foto_capa is true 
                            and 
                                id_produto = produto.id
                        ) as foto_produto 
                        FROM produto $pesquisa";

        return $this->getResult($query);
    }
    
    public function getProdutosByCategoria($id_categoria)
    {

      
        $query = "SELECT
                        id,
                        titulo,
                        descricao,
                        id_categoria,
                        valor,
                        (
                         select 
                            url 
                            from 
                                fotos_produto 
                            WHERE 
                                foto_capa is true 
                            and 
                                id_produto = produto.id
                        ) as foto_produto 
                        FROM produto 
                        WHERE 
                        id_categoria = $id_categoria";

        return $this->getResult($query);
    }
    public function getProdutoById($idProduto)
    {
        $query = "SELECT 
                        id,
                        titulo,
                        descricao,
                        id_categoria,
                        valor,
                    (
                     SELECT 
                            url 
                            FROM 
                                fotos_produto 
                            WHERE 
                                foto_capa IS TRUE 
                            AND 
                                id_produto = produto.id
                        ) AS foto_produto  
                    FROM 
                        produto
                    WHERE 
                        id = $idProduto";

        return $this->getFirstArray($query);
    }
}
