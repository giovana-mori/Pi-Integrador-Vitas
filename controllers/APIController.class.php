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
    public function pessoas()
    {
        try {
            $pessoas = new PessoaDAO();
            echo json_encode($pessoas->listar());
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
}
