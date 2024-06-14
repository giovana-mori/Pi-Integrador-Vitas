<?php

class AgendaDAO extends Conexao
{

    public function __construct()
    {
        parent::__construct();
    }

    public function inserir(Agenda $agenda)
    {
        $sql = "INSERT INTO AGENDA (DATA, HORA, DURACAO, STATUS, OBSERVACOES, FACULTATIVO, PESSOA_ID, PROFISSIONAL_ID) VALUES (?,?,?,?,?,?,?,?)";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $agenda->getData());
            $stm->bindValue(2, $agenda->getHora());
            $stm->bindValue(3, $agenda->getDuracao());
            $stm->bindValue(4, $agenda->getStatus());
            $stm->bindValue(5, $agenda->getObservacoes());
            $stm->bindValue(6, $agenda->getFacultativo());
            $stm->bindValue(7, $agenda->getIdPessoa());
            $stm->bindValue(8, $agenda->getIdProfissional());
            $stm->execute();
            $id_agenda = $this->db->lastInsertId();
            $this->db = null;
            return $id_agenda;
        } catch (PDOException $th) {
            return 0;
        }
    }
    public function alterar(Agenda $agenda)
    {
        $sql = "UPDATE agenda SET id_pessoa = ?, id_profissional = ?, data = ?, hora = ?, observacoes = ?, status = ? WHERE id_agenda = ?";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $agenda->getIdPessoa());
            $stm->bindValue(2, $agenda->getIdProfissional());
            $stm->bindValue(3, $agenda->getData());
            $stm->bindValue(4, $agenda->getHora());
            $stm->bindValue(5, $agenda->getObservacoes());
            $stm->bindValue(6, $agenda->getStatus());
            $stm->bindValue(7, $agenda->getIdAgenda());
            $stm->execute();
            $this->db = null;
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }

    public function buscar($id)
    {
        $sql = "SELECT * FROM agenda WHERE id_agenda = ?";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $id);
            $stm->execute();
            $this->db = null;
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $th) {
            return 0;
        }
    }

    public function excluir($id)
    {
        $sql = "DELETE FROM agenda WHERE id_agenda = ?";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $id);
            $stm->execute();
            $this->db = null;
            return 1;
        } catch (PDOException $th) {
            return 0;
        }
    }

    public function listar()
    {
        $sql = "SELECT * FROM agenda ORDER BY data";
        try {
            $stm = $this->db->prepare($sql);
            $stm->execute();
            $this->db = null;
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $th) {
            return [];
        }
    }
}
