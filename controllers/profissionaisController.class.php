<?php

class ProfissionaisController extends layoutAdminController
{
    public function index()
    {
        $data['title'] = 'Lista de Profissionais';
        $profissionais = new ProfissionalDAO();
        $data['profissionais'] = $profissionais->listarProfissionais();
        // $data['estados'] = Utils::loadEstados();
        $this->render('views/admin/listaProfissionais', $data);
    }
    public function cadastro()
    {
        $data['title'] = 'Cadastrar Profissional';
        $tipoprofissional = new Tipo_profissionalDAO();
        $data['tipo_profissional'] = $tipoprofissional->listar();
        $especialidades = new EspecialidadeDAO();
        $data['especialidades'] = $especialidades->listar();

        $this->render('views/admin/cadastrarProfissional', $data);
    }
    public function inserir()
    {
        //post data from PessoaDAO
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //check if data form is valid
            $profissional = new Profissional();
            $profissional->setRegistroProfissional($_POST['registro_profissional']);
            $profissional->setId_pessoa($_POST['id_pessoa']);
            $profissional->setTipo_profissional($_POST['tipo_profissional']);
            $profissional->setEspecialidade($_POST['especialidade']);

            print_r($profissional);
            exit;

            $profissionalDAO = new ProfissionalDAO();
            if ($profissionalDAO->inserir($profissional))
                // header location for current path
                header('Location: ' . $_SERVER['REQUEST_URI']);
            else
                echo 'Erro ao atualizar dados!';
        }
    }

    public function editar($id = null)
    {
        if (!$id) {
            header('Location: profissionais');
        }
        $data['title'] = 'Editar Profissional';
        $profissional = new ProfissionalDAO();
        $data['profissional'] = $profissional->buscarID((int)$id);
        if (!$data['profissional']) {
            header('Location: ' . Utils::base_url('profissionais'));
        }
        $clinica = new ClinicaDAO();
        $data['clinica'] = $clinica->buscarID(1);
        $data['clinica']['SEGUNDA'] = Utils::splitHourClinica($data['clinica']['SEGUNDA']);
        $data['clinica']['TERCA'] = Utils::splitHourClinica($data['clinica']['TERCA']);
        $data['clinica']['QUARTA'] = Utils::splitHourClinica($data['clinica']['QUARTA']);
        $data['clinica']['QUINTA'] = Utils::splitHourClinica($data['clinica']['QUINTA']);
        $data['clinica']['SEXTA'] = Utils::splitHourClinica($data['clinica']['SEXTA']);
        $data['clinica']['SABADO'] = Utils::splitHourClinica($data['clinica']['SABADO']);
        $data['clinica']['DOMINGO'] = Utils::splitHourClinica($data['clinica']['DOMINGO']);

        $tipo = new Tipo_profissionalDAO();
        $data['tipos_profissional'] = $tipo->listar();

        $especialidades = new EspecialidadeDAO();
        $data['especialidades'] = $especialidades->listar();

        $horarios = new Horario_profissionalDAO();


        $this->render('views/admin/cadastrarProfissional', $data);
    }
    public function update()
    {
        //post data from PessoaDAO
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //check if data form is valid
            $profissional = new Profissional();
            $profissional->setRegistroProfissional($_POST['registro_profissional']);
            $profissional->setId_pessoa($_POST['id_pessoa']);
            $profissional->setTipo_profissional($_POST['tipo_profissional']);
            $profissional->setEspecialidade($_POST['especialidade']);

            print_r($profissional);
            exit;

            $profissionalDAO = new ProfissionalDAO();
            if ($profissionalDAO->inserir($profissional))
                // header location for current path
                header('Location: ' . $_SERVER['REQUEST_URI']);
            else
                echo 'Erro ao atualizar dados!';
        }
    }
}
