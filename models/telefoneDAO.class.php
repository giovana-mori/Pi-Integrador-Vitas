<?php

class Telefone extends Conexao
{
    public function __construct()
    {
        parent::__construct();
    }

    public function inserir($telefone)
    {
        $sql = "INSERT INTO telefone (ddd, numero, id_pessoa) VALUES (?,?,?)";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindParam(1, $telefone->ddd);
            $stm->bindParam(2, $telefone->numero);
            $stm->bindParam(3, $telefone->id_pessoa);
            $stm->execute();
            $id_telefone = $this->db->lastInsertId();
            $this->db = null;
            return $id_telefone;
        } catch (PDOException $e) {
            return 0;
        }
    }
    public function alterar($telefone)
    {
        $sql = "UPDATE telefone SET ddd = ?, numero = ? WHERE id_telefone = ?";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindParam(1, $telefone->ddd);
            $stm->bindParam(2, $telefone->numero);
            $stm->bindParam(3, $telefone->id_telefone);
            $stm->execute();
            $this->db = null;
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function listar()
    {
        $sql = "SELECT * FROM telefone";
        try {
            $stm = $this->db->prepare($sql);
            $stm->execute();
            $this->db = null;
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            return [];
        }
    }
}