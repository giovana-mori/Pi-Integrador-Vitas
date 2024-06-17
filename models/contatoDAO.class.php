<?php

class ContatoDAO extends Conexao
{
    public function __construct()
    {
        parent::__construct();
    }

    public function inserir(Contato $contato)
    {
        $sql = "INSERT INTO CONTATOS (pessoa_id, assunto, descricao, data) VALUES (?, ?, ?, ?)";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $contato->getIdPessoa());
            $stm->bindValue(2, $contato->getAssunto());
            $stm->bindValue(3, $contato->getDescricao());
            $stm->bindValue(4, date('Y-m-d'));
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
        $sql = "SELECT ID_CONTATO, ASSUNTO, DESCRICAO, CONTATOS.DATA, PESSOAS.NOME, CONTATOS.PESSOA_ID 
        FROM CONTATOS
        LEFT JOIN PESSOAS ON PESSOAS.ID_PESSOA = CONTATOS.PESSOA_ID";
        try {
            $stm = $this->db->prepare($sql);
            $stm->execute();
            $contato = $stm->fetchAll(PDO::FETCH_ASSOC);
            $this->db = null;
            return $contato;
        } catch (PDOException $e) {
            return 0;
        }
    }
}
