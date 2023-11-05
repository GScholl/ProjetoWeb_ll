<?php


namespace Controllers;

use Models\BaseModel;
use Controllers\BaseController;
use Libraries\Template;
use Models\CategoriaModel;
use Models\ProdutoModel;

class Home extends BaseController
{

    public $template, $produtoModel, $categoriaModel;
    public function __construct()
    {
        $this->template = new Template();
        $this->produtoModel = new ProdutoModel();
        $this->categoriaModel = new CategoriaModel();
    }
    public function index()
    {
        if (isset($_GET["pesquisa"])) {

            $dados['categorias'] = $this->categoriaModel->getCategorias($_GET["pesquisa"]);
            $dados['produtos'] = $this->produtoModel->getProdutos($_GET["pesquisa"]);
        } else {

            $dados['categorias'] = $this->categoriaModel->getCategorias();
            $dados['produtos'] = $this->produtoModel->getProdutos();
        }

        echo $this->template->navbar();
        echo view("home", $dados);
        echo $this->template->footer();
    }
}
