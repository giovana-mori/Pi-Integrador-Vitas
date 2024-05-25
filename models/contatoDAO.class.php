<?php

class Contato extends Conexao
{
    public function __construct()
    {
        parent::__construct();
    }

    public function inserir(Contato $contato)
    {
        $sql = "INSERT INTO contato (id_pessoa, assunto, descricao) VALUES (?, ?, ?)";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $contato->getIdPessoa());
            $stm->bindValue(2, $contato->getAssunto());
            $stm->bindValue(3, $contato->getDescricao());
            $stm->execute();
            $id_contato = $this->db->lastInsertId();
            $this->db = null;
            return $id_contato;
        } catch (PDOException $e) {
            return 0;
        }
    }
    public function listar()
    {
        $sql = "SELECT * FROM contato";
        try {
            $stm = $this->db->prepare($sql);
            $stm->execute();
            $contato = $stm->fetchAll(PDO::FETCH_OBJ);
            $this->db = null;
            return $contato;
        } catch (PDOException $e) {
            return 0;
        }
    }
}
