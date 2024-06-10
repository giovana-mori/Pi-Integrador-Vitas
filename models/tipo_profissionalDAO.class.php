<?php

class Tipo_profissionalDAO extends Conexao
{
    public function __construct()
    {
        parent::__construct();
    }
    public function inserir(Tipo_profissional $tipo_profissional)
    {
        $sql = "INSERT INTO tipo_profissional (nome) VALUES (?)";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $tipo_profissional->getNome());
            $stm->execute();
            $id_tipo_profissional = $this->db->lastInsertId();
            $this->db = null;
            return $id_tipo_profissional;
        } catch (\Throwable $th) {
            return 0;
        }
    }
    public function alterar(Tipo_profissional $tipo_profissional)
    {
        $sql = "UPDATE tipo_profissional SET nome=? WHERE id=?";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $tipo_profissional->getNome());
            $stm->bindValue(2, $tipo_profissional->getId_tipo_profissional());
            $stm->execute();
            $this->db = null;
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
    public function excluir(Tipo_profissional $tipo_profissional)
    {
        $sql = "DELETE FROM tipo_profissional WHERE id=?";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $tipo_profissional->getId_tipo_profissional());
            $stm->execute();
            $this->db = null;
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
    public function listar()
    {
        $sql = "SELECT * FROM tipo_profissional";
        try {
            $stm = $this->db->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            return [];
        }
    }
}
