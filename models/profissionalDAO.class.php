<?php

class ProfissionalDAO extends Conexao
{
    public function __construct()
    {
        parent::__construct();
    }

    public function cadastrarProfissional($profissional)
    {
        $sql = "INSERT INTO profissional (registroProfissional) VALUES (?)";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(1, $profissional->getRegistroProfissional());
            $stmt->execute();
            $id_profissional = $this->db->lastInsertId();
            $this->db = null;
            return $id_profissional;
        } catch (PDOException $e) {
            return 0;
        }
    }

    public function listarProfissionais()
    {
        $sql = "SELECT * FROM profissional";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            $this->db = null;
            return $result;
        } catch (PDOException $e) {
            return [];
        }
    }
    public function loginProfissional($profissional)
    {
        try {
            $sql = "SELECT * FROM pessoa INNER JOIN profissional ON pessoa.id_pessoa = profissional.id_pessoa WHERE pessoa.email = ? AND pessoa.senha = ?";
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $profissional->getEmail());
            $stm->bindValue(2, $profissional->getSenha());
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_OBJ);
            $this->db = null;
            return $result;
        } catch (PDOException $e) {
            return false;
        }
    }
    public function listarConvenios($paciente)
    {
        try {
            $sql = "SELECT * FROM paciente_conv INNER JOIN convenio ON paciente_conv.id_convenio = convenio.id_convenio WHERE paciente_conv.id_paciente = ?";
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $paciente->getId_paciente());
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_OBJ);
            $this->db = null;
            return $result;
        } catch (PDOException $e) {
            return [];
        }
    }
}