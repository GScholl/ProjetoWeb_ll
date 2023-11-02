<?php

namespace Controllers;

use Controllers\BaseController;
use Libraries\Session;
use Models\ClientesModel;

class Cliente extends BaseController
{
    public function __construct()
    {
        $this->clientesModel =  new ClientesModel();
        $this->session = new Session();
    }
    public function login()
    {
        if(usuarioLogado()){
            redirect("meu-carrinho");
        }
        echo view("login");
    }
    
    public function autenticar()
    {

        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $cliente = $this->clientesModel->getCliente($email);
        if (!$cliente) {

            redirect('login');
        }
        if (md5($senha) != $cliente->senha) {

            redirect('login');
        }

        $this->session->set('id_cliente', $cliente->id);
        $this->session->set('nome_cliente', $cliente->nome);
        redirect("meu-carrinho");
    }

    public function cadastrarCliente()
    {
    }

    public function registro()
    {
        echo view("registro");
    }
}
