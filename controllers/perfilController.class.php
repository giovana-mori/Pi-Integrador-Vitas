<?php


class PerfilController extends layoutAdminController
{
    public function index()
    {
        $data['title'] = 'Perfil';
        $pessoa = new PessoaDAO();
        $data['pessoa'] = $pessoa->buscarID($_SESSION['user_id']);
        $data['estados'] = Utils::loadEstados();
        if (isset($data['pessoa']["ESTADO"]))
            $data['cidades'] = Utils::loadCidades($data['pessoa']["ESTADO"]);

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
            $pessoa->setTelefone1($_POST['telefone1']);
            $pessoa->setTelefone2($_POST['telefone2']);

            $pessoaDAO = new PessoaDAO();
            if ($pessoaDAO->alterar($pessoa)) {
                // header location for current path
                header('Location: ' . Utils::base_url('perfil') . '?mensagem_sucesso=Perfil Atualizado com Sucesso!');
            } else {
                echo 'Erro ao atualizar dados!';
            }
        }
    }

    public function meuagendamento()
    {
        $data['title'] = 'Meu Agendamento';
        $agendamento = new AgendaDAO();
        $agendamentos = $agendamento->buscarMeusAgendamentos($_SESSION['user_id']);
        //foreach nos agendamentos e buscar os uploads
        foreach ($agendamentos as $key => $value) {
            //insere no array do agendamento a chave upload e seu respectivo valo
            $agendamentos[$key]["UPLOADS"] = $agendamento->getUploads($_SESSION['user_id']);
        }
        $data['agendamentos'] = $agendamentos;
        $this->render('views/admin/meusAgendamentos', $data);
    }
}
