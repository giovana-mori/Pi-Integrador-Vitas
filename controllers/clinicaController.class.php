<?php

class ClinicaController extends layoutAdminController
{
    public function index()
    {
        $data['title'] = 'Editar Clinica';
        $clinica = new ClinicaDAO();
        $data['clinica'] = $clinica->buscarID(1);
        $data['clinica']['SEGUNDA'] = Utils::splitHourClinica($data['clinica']['SEGUNDA']);
        $data['clinica']['TERCA'] = Utils::splitHourClinica($data['clinica']['TERCA']);
        $data['clinica']['QUARTA'] = Utils::splitHourClinica($data['clinica']['QUARTA']);
        $data['clinica']['QUINTA'] = Utils::splitHourClinica($data['clinica']['QUINTA']);
        $data['clinica']['SEXTA'] = Utils::splitHourClinica($data['clinica']['SEXTA']);
        $data['clinica']['SABADO'] = Utils::splitHourClinica($data['clinica']['SABADO']);
        $data['clinica']['DOMINGO'] = Utils::splitHourClinica($data['clinica']['DOMINGO']);

        $data['estados'] = Utils::loadEstados();
        $this->render('views/admin/clinica', $data);
    }
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //check if data form is valid
            $clinica = new Clinica();
            $clinica->setIdClinica($_POST['id_clinica']);
            $clinica->setNome($_POST['name']);
            $clinica->setCnpj($_POST['cnpj']);
            $clinica->setInscricaoEstadual($_POST['inscricao_estadual']);
            $clinica->setEmail($_POST['email']);
            $clinica->setTelefone($_POST['telefone']);
            $clinica->setWhatsapp($_POST['whatsapp']);
            $clinica->setCep($_POST['cep']);
            $clinica->setLogradouro($_POST['logradouro']);
            $clinica->setBairro($_POST['bairro']);
            $clinica->setEstado($_POST['estado']);
            $clinica->setCidade($_POST['cidade']);

            $segunda =  $_POST['segunda']['manha_inicio'] . '|' . $_POST['segunda']['manha_termino'] . ';' . $_POST['segunda']['almoco_inicio'] . '|' . $_POST['segunda']['almoco_termino'] . ';' . $_POST['segunda']['tarde_inicio'] . '|' . $_POST['segunda']['tarde_termino'];
            $clinica->setSegunda($segunda);
            $terca =    $_POST['terca']['manha_inicio'] . '|' . $_POST['terca']['manha_termino'] . ';' . $_POST['terca']['almoco_inicio'] . '|' . $_POST['terca']['almoco_termino'] . ';' . $_POST['terca']['tarde_inicio'] . '|' . $_POST['terca']['tarde_termino'];
            $clinica->setTerca($terca);
            $quarta =   $_POST['quarta']['manha_inicio'] . '|' . $_POST['quarta']['manha_termino'] . ';' . $_POST['quarta']['almoco_inicio'] . '|' . $_POST['quarta']['almoco_termino'] . ';' . $_POST['quarta']['tarde_inicio'] . '|' . $_POST['quarta']['tarde_termino'];
            $clinica->setQuarta($quarta);
            $quinta =   $_POST['quinta']['manha_inicio'] . '|' . $_POST['quinta']['manha_termino'] . ';' . $_POST['quinta']['almoco_inicio'] . '|' . $_POST['quinta']['almoco_termino'] . ';' . $_POST['quinta']['tarde_inicio'] . '|' . $_POST['quinta']['tarde_termino'];
            $clinica->setQuinta($quinta);
            $sexta =    $_POST['sexta']['manha_inicio'] . '|' . $_POST['sexta']['manha_termino'] . ';' . $_POST['sexta']['almoco_inicio'] . '|' . $_POST['sexta']['almoco_termino'] . ';' . $_POST['sexta']['tarde_inicio'] . '|' . $_POST['sexta']['tarde_termino'];
            $clinica->setSexta($sexta);
            $sabado = $_POST['sabado']['manha_inicio'] . '|' . $_POST['sabado']['manha_termino'] . ';' . $_POST['sabado']['almoco_inicio'] . '|' . $_POST['sabado']['almoco_termino'] . ';' . $_POST['sabado']['tarde_inicio'] . '|' . $_POST['sabado']['tarde_termino'];
            $clinica->setSabado($sabado);
            $domingo =  $_POST['domingo']['manha_inicio'] . '|' . $_POST['domingo']['manha_termino'] . ';' . $_POST['domingo']['almoco_inicio'] . '|' . $_POST['domingo']['almoco_termino'] . ';' . $_POST['domingo']['tarde_inicio'] . '|' . $_POST['domingo']['tarde_termino'];
            $clinica->setDomingo($domingo);
            $clinica->setFeriados(false);

            $clinicaDAO = new ClinicaDAO();
            if ($clinicaDAO->alterar($clinica))
                // header location for current path
                header('Location: ' . Utils::base_url('clinica') . '?mensagem_sucesso=Dados Atualizado com Sucesso!');
            else
                echo 'Erro ao atualizar dados!';
        }
    }
}
