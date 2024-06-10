<?php

class Horario_profissionalDAO extends Conexao
{
    public function __construct()
    {
        parent::__construct();
    }

    public function inserir($horario_profissional)
    {
        $sql = "INSERT INTO HORARIOS_PROFISSIONAIS (DIA_SEMANA, HORA_INICIO, HORA_FIM, DURACAO, PROFISSIONAL_ID) VALUES (?, ?, ?, ?, ?)";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $horario_profissional->getDia_semana());
            $stm->bindValue(2, $horario_profissional->getHorario_inicio());
            $stm->bindValue(3, $horario_profissional->getHorario_fim());
            $stm->bindValue(4, $horario_profissional->getDuracao());
            $stm->bindValue(5, $horario_profissional->getProfissional_id());
            $stm->execute();
            $id_profissional = $this->db->lastInsertId();
            $this->db = null;
            return $id_profissional;
        } catch (PDOException $e) {
            return 0;
        }
    }

    public function alterar($horario_profissional)
    {
        $sql = "UPDATE HORARIOS_PROFISSIONAIS SET DIA_SEMANA = ?, HORA_INICIO = ?, HORA_FIM = ?, DURACAO = ?, PROFISSIONAL_ID = ?
        WHERE ID_HORARIO = ?";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $horario_profissional->getDia_semana());
            $stm->bindValue(2, $horario_profissional->getHorario_inicio());
            $stm->bindValue(3, $horario_profissional->getHorario_fim());
            $stm->bindValue(4, $horario_profissional->getDuracao());
            $stm->bindValue(5, $horario_profissional->getProfissional_id());
            $stm->bindValue(6, $horario_profissional->getId_horario());
            $stm->execute();
            $this->db = null;
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function listar()
    {
        $sql = "SELECT * FROM HORARIOS_PROFISSIONAIS";
        try {
            $stm = $this->db->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }
}
