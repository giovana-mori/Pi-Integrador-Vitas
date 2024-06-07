<?php


class PerfilController extends layoutAdminController
{
    public function index()
    {
        $data['title'] = 'Perfil';
        $pessoa = new PessoaDAO();
        $data['pessoa'] = $pessoa->buscarID($_SESSION['user_id']);
        $data['estados'] = Utils::loadEstados();
        $this->render('views/admin/perfil', $data);
    }

    public function update()
    {
        //post data from PessoaDAO
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //check if data form is valid
            $pessoa = new Pessoa();
            $pessoa->setId_pessoa($_POST['id_pessoa']);
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
            if ($pessoaDAO->alterar($pessoa))
                header('Location: perfil');
            else
                echo 'Erro ao atualizar dados!';
        }
    }
}
