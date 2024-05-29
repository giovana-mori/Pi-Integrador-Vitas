<?php

class AgendamentosController extends layoutAdminController
{
    public function index()
    {
        $data['title'] = 'Agendamentos';
        $profissionais = new ProfissionalDAO();
        $data['profissionais'] = $profissionais->listarMedicos();
        $this->render('views/admin/agendamentos', $data);
    }
}