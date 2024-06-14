<?php

class ProfissionaisController extends layoutAdminController
{
    public function index()
    {
        $data['title'] = 'Lista de Profissionais';
        $profissionais = new ProfissionalDAO();
        $data['profissionais'] = $profissionais->listarProfissionais();
        $this->render('views/admin/listaProfissionais', $data);
    }
    public function cadastro()
    {
        $data['title'] = 'Cadastrar Profissional';
        $tipoprofissional = new Tipo_profissionalDAO();
        $data['tipo_profissional'] = $tipoprofissional->listar();
        $especialidades = new EspecialidadeDAO();
        $data['especialidades'] = $especialidades->listar();
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

        $this->render('views/admin/cadastrarProfissional', $data);
    }
    public function inserir()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //check if data form is valid
            $profissional = new Profissional();
            $profissional->setRegistroProfissional($_POST['registro_profissional']);
            $profissional->setId_pessoa($_POST['id_pessoa']);
            $profissional->setTipo_profissional($_POST['tipo_profissional']);
            $profissional->setEspecialidade($_POST['especialidade']);


            $profissionalDAO = new ProfissionalDAO();
            $id_profissional = $profissionalDAO->inserir($profissional);

            if ($id_profissional > 0) {
                $profissional->setId_profissional($id_profissional);
                $especialidade_profissional_id = $profissionalDAO->inserirEspecialidade($profissional);

                if ($especialidade_profissional_id) {
                    $horarios = new Horario_profissional();
                    //create for each day of week
                    foreach ($_POST as $key => $value) {
                        if (is_array($value)) {
                            $horarioDAO = new Horario_profissionalDAO();
                            $horarios->setDia_semana($key);
                            $horarios->setProfissional_id($id_profissional);
                            $horarios->setPeriodo('manha');
                            $horarios->setHorario_inicio(empty($value['manha_inicio']) ? null : $value['manha_inicio']);
                            $horarios->setHorario_fim(empty($value['manha_termino']) ? null : $value['manha_termino']);
                            $horarios->setDuracao(60);
                            $horarioDAO->inserir($horarios);
                            //insert
                            $horarioDAO = new Horario_profissionalDAO();
                            $horarios->setDia_semana($key);
                            $horarios->setProfissional_id($id_profissional);
                            $horarios->setPeriodo('tarde');
                            $horarios->setHorario_inicio(empty($value['tarde_inicio']) ? null : $value['tarde_inicio']);
                            $horarios->setHorario_fim(empty($value['tarde_termino']) ? null : $value['tarde_termino']);
                            $horarios->setDuracao(60);
                            $horarioDAO->inserir($horarios);
                            //insert
                        }
                    }
                }

                header('Location: ' . Utils::base_url('profissionais'));
            } else
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
        $horarios_get = $horarios->buscarID($id);

        $result = [];

        foreach ($horarios_get as $item) {
            $diaSemana = $item['DIA_SEMANA'];
            $periodo = $item['PERIODO'];

            if (!isset($result[$diaSemana])) {
                $result[$diaSemana] = [];
            }

            if (!isset($result[$diaSemana][$periodo])) {
                $result[$diaSemana][$periodo] = [];
            }

            $result[$diaSemana][$periodo] = [
                'HORA_INICIO' => $item['HORA_INICIO'],
                'HORA_FIM' => $item['HORA_FIM']
            ];
        }

        $data["horarios"] = $result;

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
            $profissional->setId_profissional($_POST['id_profissional']);
            $profissional->setTipo_profissional($_POST['tipo_profissional']);
            $profissional->setEspecialidade($_POST['especialidade']);

            $profissionalDAO = new ProfissionalDAO();
            if ($profissionalDAO->alterar($profissional)) {
                $especialidade_profissional_id = $profissionalDAO->alterarEspecialidade($profissional);
                if ($especialidade_profissional_id) {
                    $horarios = new Horario_profissional();
                    //create for each day of week
                    foreach ($_POST as $key => $value) {
                        if (is_array($value)) {
                            $horarioDAO = new Horario_profissionalDAO();
                            $horarios->setDia_semana($key);
                            $horarios->setProfissional_id($profissional->getId_profissional());
                            $horarios->setPeriodo('manha');
                            $horarios->setHorario_inicio(empty($value['manha_inicio']) ? null : $value['manha_inicio']);
                            $horarios->setHorario_fim(empty($value['manha_termino']) ? null : $value['manha_termino']);
                            $horarios->setDuracao(60);
                            $horarioDAO->alterar($horarios);
                            //update
                            $horarioDAO = new Horario_profissionalDAO();
                            $horarios->setDia_semana($key);
                            $horarios->setProfissional_id($profissional->getId_profissional());
                            $horarios->setPeriodo('tarde');
                            $horarios->setHorario_inicio(empty($value['tarde_inicio']) ? null : $value['tarde_inicio']);
                            $horarios->setHorario_fim(empty($value['tarde_termino']) ? null : $value['tarde_termino']);
                            $horarios->setDuracao(60);
                            $horarioDAO->alterar($horarios);
                            //update
                        }
                    }
                }

                header('Location: ' . Utils::base_url('profissionais'));
            } else
                echo 'Erro ao atualizar dados!';
        }
    }
}
