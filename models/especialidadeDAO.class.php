<?php

class EspecialidadeDAO extends Conexao
{
    public function __construct()
    {
        parent::__construct();
    }

    public function inserir($especialidade)
    {
        $sql = "INSERT INTO especialidade (descritivo, tipo) VALUES (?,?)";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $especialidade->getDescricao());
            $stm->bindValue(2, $especialidade->getTipo());
            $stm->execute();
            $id_especialidade = $this->db->lastInsertId();
            $this->db = null;
            return $id_especialidade;
        }catch (Exception $e){
            return 0;
        }
    }

    public function listar()
    {
        try {
            $sql = "SELECT * FROM especialidade";
            $stm = $this->db->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            return [];
        }
    }
}