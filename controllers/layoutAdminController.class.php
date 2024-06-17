<?php

abstract class layoutAdminController extends AuthController
{
    /**
     * layoutAdminController constructor.
     */
    private $menu;
    public function __construct()
    {
        parent::checkLoggedUser();
    }

    public function render($nameView, $data = array())
    {
        $this->menu = array(
            array('Perfil', 'perfil', ['PACIENTE', 'ADM GERAL', 'PROFISSIONAL SAÚDE']),
            array('Agendar', 'agendar', ['PACIENTE']),
            array('Criar Agendamento', 'agendarpresencial', ['ADM GERAL']),
            array('Agendamentos', 'agendamentos', ['ADM GERAL']),
            array('Clientes', 'clientes', ['ADM GERAL']),
            array('Profissionais', 'profissionais', ['ADM GERAL']),
            array('Configurações', 'clinica', ['ADM GERAL']),
            array('Meus Agendamentos', 'meusagendamentos', ['PACIENTE']),
            array('Meus Atendimentos', 'meusatendimentos', ['PROFISSIONAL SAÚDE']),
            array('Contato', 'contato', ['PACIENTE', 'PROFISSIONAL SAÚDE'])
        );
        extract($data);
        include_once 'views/layoutAdmin/header.php';
        include_once $nameView . '.php';
        include_once 'views/layoutAdmin/footer.php';
    }
}
