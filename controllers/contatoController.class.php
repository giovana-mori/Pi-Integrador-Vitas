<?php

class ContatoController extends layoutAdminController
{
    public function index()
    {
        //render view
        $this->render('views/admin/contato');
    }

    public function listar()
    {
        $data['title'] = 'Contatos';
        $contatoDAO = new ContatoDAO();
        $data["contatos"] = $contatoDAO->listar();
        $this->render('views/admin/listaContatos', $data);
    }

    public function inserir()
    {
        //post data from PessoaDAO
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //check if data form is valid
            $contato = new Contato();
            $contato->setAssunto($_POST['assunto']);
            $contato->setDescricao($_POST['descrption']);
            $contato->setIdPessoa($_POST['id_pessoa']);

            $contatoDAO = new ContatoDAO();
            if ($contatoDAO->inserir($contato))
                // header location for current path
                header('Location: ' . Utils::base_url('contato'));
            else
                echo 'Erro ao atualizar dados!';
        }
    }

    public function sendEmail()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];
            Utils::enviarEmailSMTP($name, $email, $message);
            $this->render('views/admin/contato');
        }
    }
}
