<?php

namespace Controllers;

use Controllers\BaseController;
use Libraries\Session;
use Models\CategoriaModel;
use Models\ProdutoModel;
use Libraries\Template;

class Produto extends BaseController
{
    public $template, $produtoModel, $categoriaModel;
    public function __construct()
    {
        $this->template =  new Template();
        $this->produtoModel = new ProdutoModel();
        $this->categoriaModel = new CategoriaModel();
    }
    public function produto($id_produto)
    {
        $dados['produto'] = $this->produtoModel->getProdutoById($id_produto);


        echo $this->template->navbar();
        echo view("produto", $dados);
        echo $this->template->footer();
    }

    public function produtosByCategoria($id_categoria)
    {
        $dados['categoria'] = $this->categoriaModel->getCategoriaById($id_categoria);
        $dados['produtos'] = $this->produtoModel->getProdutosByCategoria($id_categoria);

        echo $this->template->navbar();
        echo view("produtosCategoria", $dados);
        echo $this->template->footer();
    }
}
