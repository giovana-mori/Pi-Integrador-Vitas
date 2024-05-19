<?php

class PacienteDAO extends Conexao
{
    public function __construct()
    {
        parent::__construct();
    }
    public function cadastrarPaciente($paciente)
    {
        try {
            $sql = "INSERT INTO paciente (id_pessoa) VALUES (?)";
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $paciente->getId_pessoa());
            $stm->execute();
            $id_paciente = $this->db->lastInsertId();
            $this->db = null;
            return $id_paciente;
        } catch (PDOException $e) {
            return 0;
        }
    }
    public function alterar($paciente)
    {
        try {
            $sql = "UPDATE paciente SET id_pessoa = ? WHERE id_paciente = ?";
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $paciente->getId_pessoa());
            $stm->bindValue(2, $paciente->getId_paciente());
            $stm->execute();
            $this->db = null;
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    public function listar()
    {
        try {
            $sql = "SELECT * FROM paciente";
            $stm = $this->db->prepare($sql);
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_OBJ);
            $this->db = null;
            return $result;
        } catch (PDOException $e) {
            return [];
        }
    }
    public function loginPaciente($paciente)
    {
        try {
            $sql = "SELECT * FROM pessoa INNER JOIN paciente ON pessoa.id_pessoa = paciente.id_pessoa WHERE pessoa.email = ? AND pessoa.senha = ?";
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $paciente->getEmail());
            $stm->bindValue(2, $paciente->getSenha());
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_OBJ);
            $this->db = null;
            return $result;
        } catch (PDOException $e) {
            return false;
        }
    }
    public function listarConvenios($paciente){
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
