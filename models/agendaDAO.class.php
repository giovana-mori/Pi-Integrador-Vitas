<?php

class AgendaDAO extends Conexao
{

    public function __construct()
    {
        parent::__construct();
    }

    public function inserir(Agenda $agenda)
    {
        $sql = "INSERT INTO AGENDAS (DATA, HORA, DURACAO, STATUS, OBSERVACOES, FACULTATIVO, PESSOA_ID, PROFISSIONAL_ID) VALUES (?,?,?,?,?,?,?,?)";
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
        $sql = "UPDATE AGENDAS SET id_pessoa = ?, id_profissional = ?, data = ?, hora = ?, observacoes = ?, status = ? WHERE id_agenda = ?";
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
    public function buscarID($id)
    {
        $sql = "SELECT ID_AGENDA, DATA, HORA, DURACAO, STATUS, OBSERVACOES, FACULTATIVO, PROFISSIONAIS.PESSOA_ID, PROFISSIONAL_ID, ID_PROFISSIONAL, REGISTROCLASSEPROFISSIONAL, TIPO_PROFISSIONAL_ID, NOME AS NOME_PROFISSIONAL 
                FROM AGENDAS 
                LEFT JOIN PROFISSIONAIS ON PROFISSIONAIS.ID_PROFISSIONAL = AGENDAS.PROFISSIONAL_ID
                LEFT JOIN PESSOAS ON PESSOAS.ID_PESSOA = PROFISSIONAIS.PESSOA_ID
                WHERE id_agenda = ?";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $id);
            $stm->execute();
            return $stm->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            return 0;
        }
    }

    public function buscarMeusAgendamentos($id)
    {
        $sql = "SELECT ID_AGENDA, DATA, HORA, DURACAO, STATUS, OBSERVACOES, FACULTATIVO, PROFISSIONAIS.PESSOA_ID, PROFISSIONAL_ID, ID_PROFISSIONAL, REGISTROCLASSEPROFISSIONAL, TIPO_PROFISSIONAL_ID, NOME AS NOME_PROFISSIONAL
                FROM AGENDAS
                LEFT JOIN PROFISSIONAIS ON PROFISSIONAIS.ID_PROFISSIONAL = AGENDAS.PROFISSIONAL_ID
                LEFT JOIN PESSOAS ON PESSOAS.ID_PESSOA = PROFISSIONAIS.PESSOA_ID
                WHERE AGENDAS.PESSOA_ID = ?";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $id);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            return [];
        }
    }
    //get date now in parameter $date
    public function buscarMeusAtendimentos($id, $date = "1980-01-01")
    {
        $sql = "SELECT ID_AGENDA, DATA, HORA, DURACAO, STATUS, OBSERVACOES, FACULTATIVO, PROFISSIONAIS.PESSOA_ID, PROFISSIONAL_ID, ID_PROFISSIONAL, REGISTROCLASSEPROFISSIONAL, TIPO_PROFISSIONAL_ID, NOME AS NOME_PROFISSIONAL
                FROM AGENDAS
                LEFT JOIN PROFISSIONAIS ON PROFISSIONAIS.ID_PROFISSIONAL = AGENDAS.PROFISSIONAL_ID
                LEFT JOIN PESSOAS ON PESSOAS.ID_PESSOA = PROFISSIONAIS.PESSOA_ID
                WHERE AGENDAS.PROFISSIONAL_ID = ? AND DATA = ?
                ORDER BY DATA, HORA";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $id);
            $stm->bindValue(2, $date);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            return [];
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
        $sql = "SELECT ID_AGENDA, DATA, HORA, DURACAO, STATUS, OBSERVACOES, FACULTATIVO, PROFISSIONAIS.PESSOA_ID, PROFISSIONAL_ID, ID_PROFISSIONAL, REGISTROCLASSEPROFISSIONAL, TIPO_PROFISSIONAL_ID, NOME AS NOME_PROFISSIONAL
                FROM AGENDAS 
                LEFT JOIN PROFISSIONAIS ON PROFISSIONAIS.ID_PROFISSIONAL = AGENDAS.PROFISSIONAL_ID
                LEFT JOIN PESSOAS ON PESSOAS.ID_PESSOA = PROFISSIONAIS.PESSOA_ID 
                ORDER BY data";
        try {
            $stm = $this->db->prepare($sql);
            $stm->execute();
            $this->db = null;
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            return [];
        }
    }

    public function insertUpload($file, $id)
    {
        $sql = "INSERT INTO AGENDA_UPLOADS (URL, AGENDA_ID) VALUES (?, ?)";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $file);
            $stm->bindValue(2, $id);
            $stm->execute();
            $id_agenda_upload = $this->db->lastInsertId();
            $this->db = null;
            return $id_agenda_upload;
        } catch (PDOException $th) {
            return 0;
        }
    }

    public function getUploads($id)
    {
        $sql = "SELECT * FROM AGENDA_UPLOADS WHERE AGENDA_ID = ?";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $id);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            return [];
        }
    }
}
