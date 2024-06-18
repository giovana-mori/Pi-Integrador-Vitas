<?php

class PessoaDAO extends Conexao
{
    public function __construct()
    {
        parent::__construct();
    }

    public function inserir($usuario)
    {
        $sql = "INSERT INTO pessoas (nome, cpf, dataNasc, genero, email, senha, cep, logradouro, bairro, estado, cidade, telefone1, telefone2) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $usuario->getNome());
            $stm->bindValue(2, $usuario->getCpf());
            $stm->bindValue(3, $usuario->getDataNasc());
            $stm->bindValue(4, $usuario->getGenero());
            $stm->bindValue(5, $usuario->getEmail());
            //Se o campo senha estiver vazio, o valor padrão é a senha padrão 12345
            $stm->bindValue(6, $usuario->getSenha() == null || $usuario->getSenha() == '' ? '$2y$10$Kd1ZwMexhr4e7Ekmsty3oOjCAtJYNYVZE5jqsQIakuhDa/fwVqhmy' : $usuario->getSenha());
            $stm->bindValue(7, $usuario->getCep());
            $stm->bindValue(8, $usuario->getLogradouro());
            $stm->bindValue(9, $usuario->getBairro());
            $stm->bindValue(10, $usuario->getEstado());
            $stm->bindValue(11, $usuario->getCidade());
            $stm->bindValue(12, $usuario->getTelefone1());
            $stm->bindValue(13, $usuario->getTelefone2());
            $stm->execute();
            $id_pessoa = $this->db->lastInsertId();
            $this->db = null;
            return $id_pessoa;
        } catch (PDOException $e) {
            return 0;
        }
    }
    public function alterar($usuario)
    {
        $sql = "UPDATE pessoas SET nome = ?, cpf = ?, dataNasc = ?, genero = ?, email = ?, cep = ?, logradouro = ?, bairro = ?, estado = ?, cidade = ?, telefone1 = ?, telefone2 = ? WHERE id_pessoa = ?";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $usuario->getNome());
            $stm->bindValue(2, $usuario->getCpf());
            $stm->bindValue(3, $usuario->getDataNasc());
            $stm->bindValue(4, $usuario->getGenero());
            $stm->bindValue(5, $usuario->getEmail());
            $stm->bindValue(6, $usuario->getCep());
            $stm->bindValue(7, $usuario->getLogradouro());
            $stm->bindValue(8, $usuario->getBairro());
            $stm->bindValue(9, $usuario->getEstado());
            $stm->bindValue(10, $usuario->getCidade());
            $stm->bindValue(11, $usuario->getTelefone1());
            $stm->bindValue(12, $usuario->getTelefone2());
            $stm->bindValue(13, $usuario->getId_pessoa());
            $stm->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function updateAvatar($id_pessoa, $urlImage)
    {
        $sql = "UPDATE pessoas SET foto = ? WHERE id_pessoa = ?";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $urlImage);
            $stm->bindValue(2, $id_pessoa);
            $stm->execute();
            $this->db = null;
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function buscarID($id)
    {
        $sql = "SELECT * FROM pessoas WHERE id_pessoa = ?";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $id);
            $stm->execute();
            $this->db = null;
            return $stm->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }
    public function buscarToken($token)
    {
        $sql = "SELECT * FROM pessoas WHERE token = ?";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $token);
            $stm->execute();
            $this->db = null;
            return $stm->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function buscar($usuario)
    {
        $sql = "SELECT * FROM pessoas WHERE nome LIKE ? ";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, "%{$usuario->getNome()}%");
            $stm->execute();
            $this->db = null;
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }

    public function listar()
    {
        $sql = "SELECT * FROM pessoas limit 15";

        try {
            $stm = $this->db->prepare($sql);
            $stm->execute();
            $this->db = null;
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }

    public function login($email, $senha)
    {
        $query = "  SELECT PE.ID_PESSOA,PE.NOME,PE.EMAIL,PE.SENHA,TPROF.NOME AS 'TIPO', PROF.ID_PROFISSIONAL
                    FROM PESSOAS PE
                    LEFT JOIN PROFISSIONAIS PROF ON PROF.PESSOA_ID = PE.ID_PESSOA
                    LEFT JOIN TIPO_PROFISSIONAL TPROF ON TPROF.ID_TIPO_PROFISSIONAL = PROF.TIPO_PROFISSIONAL_ID
                    WHERE EMAIL = ? 
                    LIMIT 0,1";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(1, $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($senha, $row['SENHA'])) {
                session_start();
                // Sucesso no login
                $_SESSION['user_id'] = $row['ID_PESSOA'];
                $_SESSION['user_name'] = $row['NOME'];
                $_SESSION['user_email'] = $row['EMAIL'];
                $_SESSION['user_tipo'] = $row['TIPO'] ?? 'PACIENTE';
                $_SESSION['user_id_profissional'] = $row['ID_PROFISSIONAL'] ?? null;

                return array(
                    "status" => "success",
                    "message" => "Sucesso!",
                    "data" => array(
                        "id" => $row['ID_PESSOA'],
                        "name" => $row['NOME'],
                        "email" => $row['EMAIL']
                    )
                );
            } else {
                return array(
                    "status" => "error",
                    "message" => "Senha inválida!"
                );
            }
        } else {
            return array(
                "status" => "error",
                "message" => "Usuario não existe!"
            );
        }
    }

    public function checkEmail($email)
    {
        $sql = "SELECT * FROM pessoas WHERE email = ?";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $email);
            $stm->execute();
            return $stm->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function generateToken($id)
    {
        $token = bin2hex(random_bytes(32));
        $sql = "UPDATE pessoas SET token = ? WHERE id_pessoa = ?";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $token);
            $stm->bindValue(2, $id);
            $stm->execute();
            return $token;
        } catch (PDOException $e) {
            return false;
        }
    }

    //update senha
    public function updateSenha($id, $senha)
    {
        $sql = "UPDATE pessoas SET senha = ? WHERE id_pessoa = ?";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $senha);
            $stm->bindValue(2, $id);
            $stm->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header("Location: login");
        exit();
    }
}
