<?php

class APIController
{
    public function __construct()
    {
        //initialize header
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
        header('Access-Control-Allow-Headers: Content-Type');
        header('Content-Type: application/json');
    }

    public function pessoas($nome = null)
    {
        try {
            $pessoas = new PessoaDAO();
            if ($nome) {
                $pessoa = new Pessoa();
                $pessoa->setNome($nome);
                echo json_encode($pessoas->buscar($pessoa));
                exit;
            }
            echo json_encode($pessoas->listar());
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function profissionais($id = null)
    {
        try {
            $profissional = new ProfissionalDAO();
            if ($id) {
                echo json_encode($profissional->buscar($id));
                exit;
            }
            echo json_encode($profissional->listarProfissionais());
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function profissionalHorarios($profissionalID = null)
    {
        try {
            $horarios = new Horario_profissionalDAO();
            if ($profissionalID) {
                $data = $horarios->buscarID($profissionalID);
                $ano = date('Y');
                $mes = date('m');
                // Coletar os dias da semana disponíveis a partir dos dados
                $diasSemanaDisponiveis = array_unique(array_column($data, 'DIA_SEMANA'));
                foreach ($data as $key => $value) {
                    $horaInicio = $value['HORA_INICIO'];
                    $horaFim = $value['HORA_FIM'];
                    $duracao = $value['DURACAO'];
                    //criar um item em data com os horarios disponiveis
                    $data[$key]['DISPONIVEIS'] = Utils::generateHorariosDisponiveis_($horaInicio, $horaFim, $duracao);
                    $data[$key]['DIAS_SEMANA_DISPONIVEIS'] = Utils::getDiasSemanaDisponiveis($ano, $mes, $diasSemanaDisponiveis);
                }

                echo json_encode($data);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function todosHorarios()
    {
        try {
            $horarios = new Horario_profissionalDAO();
            echo json_encode($horarios->listar());
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function uploadAvatar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $targetDir = "uploads/";
            $targetFile = $targetDir . basename($_FILES["profileImage"]["name"]);
            $uploadOk = 0;
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            // Verifica se o arquivo é uma imagem real ou uma imagem falsa
            $check = getimagesize($_FILES["profileImage"]["tmp_name"]);
            if ($check !== false) {
                // echo "Arquivo é uma imagem - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                // echo "Arquivo não é uma imagem.";
                echo json_encode(["error" => "Arquivo não é uma imagem"]);
                exit;
            }

            // Verifica se o arquivo já existe
            if (file_exists($targetFile)) {
                echo json_encode(["error" => "Arquivo já existe"]);
                exit;
            }

            // Verifica o tamanho do arquivo
            if ($_FILES["profileImage"]["size"] > 5000000) {
                echo json_encode(["error" => "Arquivo muito grande"]);
                exit;
            }

            // Permite determinados formatos de arquivo
            if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif"
            ) {
                echo json_encode(["error" => "Desculpe, apenas arquivos JPG, JPEG, PNG e GIF são permitidos."]);
                exit;
            }

            // Verifica se $uploadOk é 0 por causa de um erro
            if ($uploadOk == 0) {
                echo json_encode(["error" => "Desculpe, seu arquivo não foi enviado."]);
                exit;
            } else {
                if (move_uploaded_file($_FILES["profileImage"]["tmp_name"], $targetFile)) {
                    $pessoa = new PessoaDAO();
                    //concatenar no Files o caminho completo da url até a pasta uploads
                    $pessoa->updateAvatar($_POST['id_pessoa'], $_FILES["profileImage"]["name"]);
                    echo json_encode(["success" => "Arquivo "  . htmlspecialchars(basename($_FILES["profileImage"]["name"])) . " enviado com sucesso"]);
                    exit;
                } else {
                    echo json_encode(["error" => "Desculpe, houve um erro ao enviar seu arquivo."]);
                    exit;
                }
            }
        }
    }

    public function uploadLogo()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $targetDir = "uploads/";
            $targetFile = $targetDir . basename($_FILES["profileLogo"]["name"]);
            $uploadOk = 0;
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            // Verifica se o arquivo é uma imagem real ou uma imagem falsa
            $check = getimagesize($_FILES["profileLogo"]["tmp_name"]);
            if ($check !== false) {
                // echo "Arquivo é uma imagem - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                // echo "Arquivo não é uma imagem.";
                echo json_encode(["error" => "Arquivo não é uma imagem"]);
                exit;
            }

            // Verifica se o arquivo já existe
            if (file_exists($targetFile)) {
                echo json_encode(["error" => "Arquivo já existe"]);
                exit;
            }

            // Verifica o tamanho do arquivo
            if ($_FILES["profileLogo"]["size"] > 5000000) {
                echo json_encode(["error" => "Arquivo muito grande"]);
                exit;
            }

            // Permite determinados formatos de arquivo
            if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif"
            ) {
                echo json_encode(["error" => "Desculpe, apenas arquivos JPG, JPEG, PNG e GIF são permitidos."]);
                exit;
            }

            // Verifica se $uploadOk é 0 por causa de um erro
            if ($uploadOk == 0) {
                echo json_encode(["error" => "Desculpe, seu arquivo não foi enviado."]);
                exit;
            } else {
                if (move_uploaded_file($_FILES["profileLogo"]["tmp_name"], $targetFile)) {
                    $clinica = new ClinicaDAO();
                    //concatenar no Files o caminho completo da url até a pasta uploads
                    $clinica->updateLogo($_POST['id_clinica'], $_FILES["profileLogo"]["name"]);
                    echo json_encode(["success" => "Arquivo "  . htmlspecialchars(basename($_FILES["profileLogo"]["name"])) . " enviado com sucesso"]);
                    exit;
                } else {
                    echo json_encode(["error" => "Desculpe, houve um erro ao enviar seu arquivo."]);
                    exit;
                }
            }
        }
    }

    public function uploadDoc()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $targetDir = "uploads/documentos/";
            $targetFile = $targetDir . basename($_FILES["upload"]["name"]);
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            // Verifica se o arquivo já existe
            if (file_exists($targetFile)) {
                echo json_encode(["error" => "Arquivo já existe"]);
                exit;
            }

            // Verifica o tamanho do arquivo
            if ($_FILES["upload"]["size"] > 5000000) {
                echo json_encode(["error" => "Arquivo muito grande"]);
                exit;
            }

            // Permite determinados formatos de arquivo .pdf,.doc,.docx,.txt,.jpg,.jpeg,.png
            if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" && $imageFileType != "pdf" && $imageFileType != "doc"
                && $imageFileType != "docx" && $imageFileType != "txt"
            ) {
                echo json_encode(["error" => "Desculpe, apenas arquivos PDF, DOC, DOCX, TXT, JPG, JPEG, PNG e GIF são permitidos."]);
                exit;
            }

            if (move_uploaded_file($_FILES["upload"]["tmp_name"], $targetFile)) {
                $agenda = new AgendaDAO();
                //concatenar no Files o caminho completo da url até a pasta uploads
                $agenda->insertUpload($_FILES["upload"]["name"], $_POST['id_agenda']);
                echo json_encode(["success" => "Arquivo "  . htmlspecialchars(basename($_FILES["upload"]["name"])) . " enviado com sucesso"]);
                exit;
            } else {
                echo json_encode(["error" => "Desculpe, houve um erro ao enviar seu arquivo."]);
                exit;
            }
        }
    }

    public function cidades($uf = null)
    {
        if ($uf == null) {
            echo json_encode(["error" => "UF não informada"]);
            exit;
        }
        $cidades = Utils::loadCidades($uf);

        if ($cidades == null || count($cidades) == 0) {
            echo json_encode(["error" => "Estado não encontrado"]);
            exit;
        }

        echo json_encode(Utils::loadCidades($uf));
    }

    public function agendar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $agenda = new Agenda();
            $agenda->setData($_POST['data']);
            $agenda->setHora($_POST['hora']);
            $agenda->setDuracao($_POST['duracao']);
            $agenda->setIdProfissional($_POST['id_profissional']);
            $agenda->setIdPessoa($_POST['id_pessoa']);
            $agenda->setObservacoes($_POST['observacao'] ?? '');
            $agenda->setFacultativo($_POST['facultativo'] ?? false);
            $agenda->setStatus($_POST['status'] ?? 'NÃO');

            $agendamento = new AgendaDAO();
            $retorno = $agendamento->inserir($agenda);
            if ($retorno > 0) {
                echo json_encode(["success" => "Agendamento realizado com sucesso", "id_agenda" => $retorno]);
            } else {
                echo json_encode(["error" => "Erro ao agendar"]);
            }
        }
    }

    public function agendamentos($id = null,)
    {
        try {
            $agendamento = new AgendaDAO();
            if ($id) {
                $data = $agendamento->buscarID($id);
                $uploads = $agendamento->getUploads($id);
                $data['UPLOADS'] = $uploads;
                echo json_encode($data);
                exit;
            }
            echo json_encode($agendamento->listar());
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function meusagendamentos($id = null, $date = null)
    {
        try {
            $agendamento = new AgendaDAO();
            if ($id) {
                $agendamentos = $agendamento->buscarMeusAgendamentos($id, $date);
                //foreach nos agendamentos e buscar os uploads
                foreach ($agendamentos as $key => $value) {
                    //insere no array do agendamento a chave upload e seu respectivo valo
                    $agendamentos[$key]["UPLOADS"] = $agendamento->getUploads($value["ID_AGENDA"]);
                }
                echo json_encode($agendamentos);
                exit;
            }
            echo json_encode($agendamento->listar());
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function meusatendimentos($id = null, $date = null)
    {
        try {
            $agendamento = new AgendaDAO();
            if ($id) {
                $agendamentos = $agendamento->buscarMeusAtendimentos($id, $date);
                //foreach nos agendamentos e buscar os uploads
                foreach ($agendamentos as $key => $value) {
                    //insere no array do agendamento a chave upload e seu respectivo valo
                    $agendamentos[$key]["UPLOADS"] = $agendamento->getUploads($value["ID_AGENDA"]);
                }
                echo json_encode($agendamentos);
                exit;
            }
            echo json_encode($agendamento->listar());
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function buscaragendamentos($date = null)
    {
        try {
            $agendamento = new AgendaDAO();
            if ($date) {
                $agendamentos = $agendamento->buscar($date);
                //foreach nos agendamentos e buscar os uploads
                foreach ($agendamentos as $key => $value) {
                    //insere no array do agendamento a chave upload e seu respectivo valo
                    $agendamentos[$key]["UPLOADS"] = $agendamento->getUploads($value["ID_AGENDA"]);
                }
                echo json_encode($agendamentos);
                exit;
            }
            echo json_encode($agendamento->listar());
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function sendEmail()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $para = $_POST['para'];
            $assunto = $_POST['assunto'];
            $mensagem = $_POST['mensagem'];
            if (Utils::enviarEmailSMTP($para, $assunto, $mensagem)) {
                echo json_encode(["success" => "Email enviado com sucesso"]);
            } else {
                echo json_encode(["error" => "Erro ao enviar"]);
            }
        }
    }

    public function sendContato()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $contato = new Contato();
            $contato->setAssunto($_POST['assunto']);
            $contato->setDescricao($_POST['descricao']);
            $contato->setIdPessoa($_POST['id_pessoa']);

            $contatoDAO = new ContatoDAO();
            $retorno = $contatoDAO->inserir($contato);
            if ($retorno > 0) {
                echo json_encode(["success" => "Agendamento realizado com sucesso", "id_contato" => $retorno]);
            } else {
                echo json_encode(["error" => "Erro ao enviar"]);
            }
        }
    }

    public function verContato($id)
    {
        try {
            if (!$id) {
                echo json_encode(["error" => "ID não informado"]);
                exit;
            }
            $contatoDAO = new ContatoDAO();
            $contato = $contatoDAO->buscarID($id);
            if ($contato) {
                echo json_encode($contato);
            }
        } catch (Exception $e) {
            echo json_encode(["error" => $e->getMessage()]);
        }
    }

    public function buscarContatos($nome = null)
    {
        try {
            $contato = new ContatoDAO();
            if ($nome) {
                echo json_encode($contato->buscar($nome));
                exit;
            }
            echo json_encode($contato->listar());
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
