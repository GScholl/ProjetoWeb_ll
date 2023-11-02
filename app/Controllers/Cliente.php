<?php

namespace Controllers;

use Controllers\BaseController;
use Libraries\Session;
use Models\ClientesModel;

class Cliente extends BaseController
{
    public $clientesModel,$session;
    public function __construct()
    {
        $this->clientesModel =  new ClientesModel();
        $this->session = new Session();
    }
    public function login()
    {
        if (usuarioLogado()) {
            redirect("meu-carrinho");
        }
        echo view("login");
    }
    public function logout()
    {
        $this->session->delete('id_cliente');
        $this->session->delete('nome_cliente');
        redirect(' ');
    }

    public function autenticar()
    {

        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $cliente = $this->clientesModel->getCliente($email);
        if (!$cliente) {
            $this->session->set('error', "E-mail não encontrado!");
            redirect('login');
        }
        if (!password_verify($senha, $cliente->senha)) {
            $this->session->set('error', "E-mail ou senha Incorretos!");
            redirect('login');
        }

        $this->session->set('id_cliente', $cliente->id);
        $this->session->set('nome_cliente', $cliente->nome);
        redirect("meu-carrinho");
    }

    public function cadastrarCliente()
    {
        if ($_POST['senha'] != $_POST['confirma_senha']) {

            $this->session->set('error', "As Senhas digitadas não conferem!");
            redirect("registrar-se");
        }
        $cliente = [
            "nome" => $_POST["nome"],
            "sobrenome" => $_POST["sobrenome"],
            "email" => $_POST["email"],
            "senha" => password_hash($_POST["senha"], PASSWORD_DEFAULT)
        ];
        $existeCliente = $this->clientesModel->getCliente($cliente['email']);
        if ($existeCliente != false) {
            $this->session->set('error', "Já possui um cliente cadastrado com este E-mail!");
            redirect("registrar-se");
        }
        $insert = $this->clientesModel->registraCliente($cliente);
        if ($insert) {
            $this->session->set("sucesso", "Cadastro realizado com sucesso!");
            redirect("login");
        } else {
            $this->session->set("error", "Houve um erro no seu cadastro");
        }
    }

    public function registro()
    {

        echo view("registro");
    }
}
