<?php

class ConvenioDAO extends Conexao
{
    public function __construct()
    {
        parent::__construct();
    }

    public function inserir(Convenio $convenio)
    {
        $sql = "INSERT INTO convenio (nome) VALUES (?)";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $convenio->getConvenio());
            $stm->execute();
            $id_convenio = $this->db->lastInsertId();
            $this->db = null;
            return $id_convenio;
        } catch (PDOException $e) {
            return 0;
        }
    }

    public function alterar(Convenio $convenio)
    {
        $sql = "UPDATE convenio SET nome = ? WHERE id_convenio = ?";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $convenio->getConvenio());
            $stm->bindValue(2, $convenio->getIdConvenio());
            $stm->execute();
            $this->db = null;
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    public function excluir($id_convenio)
    {
        $sql = "DELETE FROM convenio WHERE id_convenio = ?";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $id_convenio);
            $stm->execute();
            $this->db = null;
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    public function buscar($id_convenio)
    {
        $sql = "SELECT * FROM convenio WHERE id_convenio = ?";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $id_convenio);
            $stm->execute();
            $this->db = null;
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            return false;
        }
    }
    public function listar()
    {
        $sql = "SELECT * FROM convenio";
        try {
            $stm = $this->db->prepare($sql);
            $stm->execute();
            $this->db = null;
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            return false;
        }
    }
}
