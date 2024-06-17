<?php

class AgendamentosController extends layoutAdminController
{
    public function index()
    {
        $data['title'] = 'Agendar Consulta';
        $profissionaisDAO = new ProfissionalDAO();
        $data['profissionais'] = $profissionaisDAO->listarProfissionais();
        $this->render('views/admin/agendamentos', $data);
    }
    public function agendarPresencial()
    {
        $data['title'] = 'Agendar Consulta';
        $profissionaisDAO = new ProfissionalDAO();
        $data['profissionais'] = $profissionaisDAO->listarProfissionais();
        $this->render('views/admin/agendamentoPresencial', $data);
    }

    public function editarAgendamento($id)
    {
        $data['title'] = 'Editar Agendamento';
        $agendaDao = new AgendaDAO();
        $agendamento = $agendaDao->buscarID($id);
        $data['agendamento'] = $agendamento;

        $profissionais = new ProfissionalDAO();
        $data['profissionais'] = $profissionais->listarProfissionais();
        // $profissionaisDAO = new ProfissionalDAO();
        // $data['profissionais'] = $profissionaisDAO->listarProfissionais();
        // $data['agendamento'] = $agendamento;
        $this->render('views/admin/editaragendamento', $data);
    }

    public function updateAgendamento()
    {
        //post data from PessoaDAO
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //check if data form is valid
            $agenda = new Agenda();
            $agenda->setIdAgenda($_POST['id_agenda']);
            $agenda->setData($_POST['data']);
            $agenda->setHora($_POST['hora']);
            $agenda->setDuracao($_POST['duracao']);
            $agenda->setIdProfissional($_POST['id_profissional']);
            $agenda->setIdPessoa($_POST['id_pessoa']);
            $agenda->setObservacoes($_POST['observacao'] ?? '');
            $agenda->setFacultativo($_POST['facultativo'] ?? false);
            $agenda->setStatus($_POST['status'] ?? 'NÃO');

            $agendamento = new AgendaDAO();
            if ($agendamento->alterar($agenda))
                // header location for current path
                header('Location: ' . Utils::base_url('agendamentos') . '?mensagem_sucesso=Agendamento Alterado com Sucesso!');
            else
                echo 'Erro ao atualizar dados!';
        }
    }
}
