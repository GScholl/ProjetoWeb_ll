<?php

namespace Controllers;

use Controllers\BaseController;
use Libraries\Session;
use Models\ClientesModel;
use Models\ProdutoModel;

use Libraries\Template;

class Carrinho extends BaseController
{
    public $session, $produtoModel, $template;
    public function __construct()
    {
        $this->template = new Template();
        $this->session = new Session();
        $this->produtoModel = new ProdutoModel();
    }

    public function carrinho()
    {
        if (!usuarioLogado()) {

            $this->session->set('error', "Antes de ir para o carrinho, faça login ou cadastre-se");
            redirect("login");
        }
        echo $this->template->navbar();
        echo view("meuCarrinho");
        echo $this->template->footer();
    }
    public function finalizarCompra()
    {
        if (!usuarioLogado()) {

            $this->session->set('error', "Antes de Finalizar a compra, faça login ou cadastre-se");
            redirect("login");
        }
        $this->session->delete('carrinho');
        echo $this->template->navbar();
        echo view("finalizarCompra");
        echo $this->template->footer();
    }
    public function criarCarrinho()
    {

        $this->session->set("carrinho", ["subtotal" => 0.0, "produtos" => []]);
    }
    public function adicionaProduto($id_produto)
    {
        if (!$this->session->get('carrinho')) {
            $this->criarCarrinho();
        }
        $produto = $this->produtoModel->getProdutoById($id_produto);
        $carrinho = $this->session->get('carrinho');
        $produto['quantidade'] = 1;
        $produto['valor_total'] = $produto['valor'];
        $carrinho['subtotal'] += $produto['valor'];

        $possuiCarrinho = false;
        foreach ($carrinho['produtos'] as $chave => $produtoCarrinho) {

            if ($produto['id'] == $produtoCarrinho['id']) {

                $carrinho['produtos'][$chave]['valor_total'] += $produto["valor"];
                $carrinho['produtos'][$chave]["quantidade"]++;
                $possuiCarrinho = true;
                break;
            }
        }
        if (!$possuiCarrinho) {
            array_push($carrinho["produtos"], $produto);
        }
        $this->session->set("carrinho", $carrinho);

        echo json_encode($carrinho);
    }

    public function removeProduto($id_produto)
    {
        if (!$this->session->get('carrinho')) {
            $this->criarCarrinho();
        }

        $carrinho = $this->session->get('carrinho');



        foreach ($carrinho['produtos'] as $chave => $produtoCarrinho) {

            if ($id_produto == $produtoCarrinho['id']) {
                $carrinho['subtotal'] -= $produtoCarrinho['valor_total'] > 0 ? $produtoCarrinho['valor_total'] : $produtoCarrinho['valor'];


                unset($carrinho["produtos"][$chave]);


                break;
            }
        }
        $carrinho['subtotal'] = $carrinho['subtotal'] < 0 || count($carrinho['produtos']) == 0 ? 0 : $carrinho['subtotal'];
        $this->session->set("carrinho", $carrinho);

        echo json_encode($carrinho);
    }
}
