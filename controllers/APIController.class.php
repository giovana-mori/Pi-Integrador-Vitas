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
                $prof = new Profissional();
                $prof->setId_profissional($id);
                echo json_encode($profissional->buscarID($prof));
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

    public function alterarPessoa()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pessoa = new Pessoa();
            $pessoa->setId_pessoa($_POST['id_pessoa']);
            $pessoa->setNome($_POST['name']);
            $pessoa->setEmail($_POST['email']);
            $pessoa->setCpf($_POST['cpf']);
            $pessoa->setLogradouro($_POST['logradouro']);
            $pessoa->setBairro($_POST['bairro']);
            $pessoa->setCidade($_POST['cidade']);
            $pessoa->setEstado($_POST['estado']);
            $pessoa->setCep($_POST['cep']);
            $pessoa->setGenero($_POST['genero']);
            $pessoa->setDataNasc($_POST['datanasc']);

            echo json_encode($pessoa);
            return 0;
            exit;


            $pessoa = new PessoaDAO();
            $pessoa->alterar($_POST);
            echo json_encode(["success" => "Pessoa alterada com sucesso"]);
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
            if ($_FILES["profileImage"]["size"] > 500000) {
                echo json_encode(["error" => "Arquivo muito grande"]);
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
            if ($_FILES["profileLogo"]["size"] > 500000) {
                echo json_encode(["error" => "Arquivo muito grande"]);
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
                echo json_encode(["success" => "Agendamento realizado com sucesso"]);
            } else {
                echo json_encode(["error" => "Erro ao agendar"]);
            }
        }
    }
}
