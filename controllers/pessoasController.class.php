<?php

class PessoasController extends layoutAdminController
{
    public function index()
    {
        $data['title'] = 'Lista de Clientes';
        $pessoa = new PessoaDAO();
        $data['pessoas'] = $pessoa->listar();
        // $data['estados'] = Utils::loadEstados();
        $this->render('views/admin/listaPessoas', $data);
    }
    public function cadastro()
    {
        $data['title'] = 'Cadastrar Cliente';
        $data['estados'] = Utils::loadEstados();
        $this->render('views/admin/cadastrarPessoa', $data);
    }
    public function inserir()
    {
        //post data from PessoaDAO
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //check if data form is valid
            $pessoa = new Pessoa();
            $pessoa->setNome($_POST['name']);
            $pessoa->setCpf($_POST['cpf']);
            $pessoa->setDataNasc($_POST['datanasc']);
            $pessoa->setGenero($_POST['genero']);
            $pessoa->setCep($_POST['cep']);
            $pessoa->setLogradouro($_POST['logradouro']);
            $pessoa->setBairro($_POST['bairro']);
            $pessoa->setEstado($_POST['estado']);
            $pessoa->setCidade($_POST['cidade']);
            $pessoa->setEmail($_POST['email']);
            $pessoaDAO = new PessoaDAO();
            if ($pessoaDAO->inserir($pessoa))
                // header location for current path
                header('Location: ' . Utils::base_url('clientes') . '?mensagem_sucesso=Cliente Inserido com Sucesso!');
            else
                echo 'Erro ao atualizar dados!';
        }
    }

    public function editar($id = null)
    {
        if (!$id) {
            header('Location: ' . Utils::base_url('perfil'));
        }
        $data['title'] = 'Editar Cliente';
        $pessoa = new PessoaDAO();
        $data['pessoa'] = $pessoa->buscarID((int)$id);
        $data['estados'] = Utils::loadEstados();
        $this->render('views/admin/perfil', $data);
    }
}
