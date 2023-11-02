<?php

namespace Controllers;

use Controllers\BaseController;
use Libraries\Session;
use Models\ClientesModel;
use Models\ProdutoModel;

class Carrinho extends BaseController
{
    public $session, $produtoModel;
    public function __construct()
    {

        $this->session = new Session();
        $this->produtoModel = new ProdutoModel();
    }

    public function carrinho()
    {
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
      
        return json_encode($carrinho);
    }

    public function removeProduto($id_produto)
    {
        if (!$this->session->get('carrinho')) {
            $this->criarCarrinho();
        }

        $carrinho = $this->session->get('carrinho');


      
        foreach ($carrinho['produtos'] as $chave => $produtoCarrinho) {

            if ($id_produto == $produtoCarrinho['id']) {
                $carrinho['subtotal'] -= $produtoCarrinho['valor'];
                if ($produtoCarrinho['valor'] < $produtoCarrinho['valor_total'] && $produtoCarrinho['quantidade'] > 1) {

                    $carrinho['produtos'][$chave]['valor_total'] -= $produtoCarrinho["valor"];
                    $carrinho['produtos'][$chave]["quantidade"]--;
                } else {
                    
                    unset($carrinho["produtos"][$chave]);
                }


                break;
            }
        }
        $carrinho['subtotal'] = $carrinho['subtotal'] < 0 ? 0: $carrinho['subtotal'];
        $this->session->set("carrinho", $carrinho);
       
        return json_encode($carrinho);
    }
}
