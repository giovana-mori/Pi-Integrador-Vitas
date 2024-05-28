<?php

class PessoaDAO extends Conexao
{
    public function __construct()
    {
        parent::__construct();
    }

    public function inserir($usuario)
    {
        $sql = "INSERT INTO pessoas (nome, cpf, dataNasc, genero, email, senha, cep, logradouro, bairro, estado, cidade) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $usuario->getNome());
            $stm->bindValue(2, $usuario->getCpf());
            $stm->bindValue(3, $usuario->getDataNasc());
            $stm->bindValue(4, $usuario->getGenero());
            $stm->bindValue(5, $usuario->getEmail());
            $stm->bindValue(6, $usuario->getSenha());
            $stm->bindValue(7, $usuario->getCep());
            $stm->bindValue(8, $usuario->getLogradouro());
            $stm->bindValue(9, $usuario->getBairro());
            $stm->bindValue(10, $usuario->getEstado());
            $stm->bindValue(11, $usuario->getCidade());
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
        $sql = "UPDATE pessoa SET nome = ?, cpf = ?, dataNasc = ?, genero = ?, email = ?, senha = ?, foto = ?, cep = ?, logradouro = ?, bairro = ?, estado = ?, cidade = ? WHERE id_pessoa = ?";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $usuario->getNome());
            $stm->bindValue(2, $usuario->getCpf());
            $stm->bindValue(3, $usuario->getDataNasc());
            $stm->bindValue(4, $usuario->getGenero());
            $stm->bindValue(5, $usuario->getEmail());
            $stm->bindValue(6, $usuario->getSenha());
            $stm->bindValue(7, $usuario->getFoto());
            $stm->bindValue(8, $usuario->getCep());
            $stm->bindValue(9, $usuario->getLogradouro());
            $stm->bindValue(10, $usuario->getBairro());
            $stm->bindValue(11, $usuario->getEstado());
            $stm->bindValue(12, $usuario->getCidade());
            $stm->bindValue(13, $usuario->getId_pessoa());
            $stm->execute();
            $this->db = null;
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    public function buscar($usuario)
    {
        $sql = "SELECT * FROM pessoa WHERE nome = ? OR cpf = ? OR dataNasc = ? OR genero = ? OR email = ? OR senha = ? OR foto = ? OR cep = ? OR logradouro = ? OR bairro = ? OR estado = ? OR cidade = ?";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $usuario->getNome());
            $stm->bindValue(2, $usuario->getCpf());
            $stm->bindValue(3, $usuario->getDataNasc());
            $stm->bindValue(4, $usuario->getGenero());
            $stm->bindValue(5, $usuario->getEmail());
            $stm->bindValue(6, $usuario->getSenha());
            $stm->bindValue(7, $usuario->getFoto());
            $stm->bindValue(8, $usuario->getCep());
            $stm->bindValue(9, $usuario->getLogradouro());
            $stm->bindValue(10, $usuario->getBairro());
            $stm->bindValue(11, $usuario->getEstado());
            $stm->bindValue(12, $usuario->getCidade());
            $stm->execute();
            $this->db = null;
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            return false;
        }
    }
    public function listar()
    {
        $sql = "SELECT * FROM pessoas";

        try {
            $stm = $this->db->prepare($sql);
            $stm->execute();
            $this->db = null;
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            return [];
        }
    }

    public function login($email, $senha)
    {
        $query = "  SELECT PE.ID_PESSOA,PE.NOME,PE.EMAIL,PE.SENHA,TPROF.NOME AS 'TIPO'
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

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header("Location: login");
        exit();
    }
}
