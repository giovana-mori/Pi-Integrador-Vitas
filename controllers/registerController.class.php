<?php

class RegisterController extends LayoutLoginController
{

    public function index()
    {
        $data['title'] = 'Registrar';
        $this->render('views/registro', $data);
    }

    public function registrar()
    {
        //post data from PessoaDAO
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //check if data form is valid
            $pessoa = new Pessoa();
            $pessoa->setNome($_POST['name']);
            $pessoa->setEmail($_POST['email']);
            $pessoa->setSenha(password_hash($_POST['senha'], PASSWORD_BCRYPT));

            $pessoaDAO = new PessoaDAO();
            //se for maior que zero, quer dizer que inseriu no banco e retornou o ID da pessoa
            if ($pessoaDAO->inserir($pessoa) > 0) {
                header('Location: ' . Utils::base_url('login') . '?mensagem_sucesso=Cadastrado com Sucesso!');
                exit;
            }

            header('Location: ' . Utils::base_url('registro'));
        }
    }
}
