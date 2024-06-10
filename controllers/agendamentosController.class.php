<?php

class AgendamentosController extends layoutAdminController
{
    public function index()
    {
        $data['title'] = 'Agendamentos';
        $profissionais = new ProfissionalDAO();
        $data['profissionais'] = $profissionais->listarProfissionais();
        $this->render('views/admin/agendamentos', $data);
    }
}