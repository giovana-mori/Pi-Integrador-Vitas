<?php

class Horario_profissionalDAO extends Conexao
{
    public function __construct()
    {
        parent::__construct();
    }

    public function inserir($horario_profissional)
    {
        $sql = "INSERT INTO HORARIOS_PROFISSIONAIS (DIA_SEMANA, PERIODO, HORA_INICIO, HORA_FIM, DURACAO, PROFISSIONAL_ID) VALUES (?, ?, ?, ?, ?, ?)";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $horario_profissional->getDia_semana());
            $stm->bindValue(2, $horario_profissional->getPeriodo());
            $stm->bindValue(3, $horario_profissional->getHorario_inicio());
            $stm->bindValue(4, $horario_profissional->getHorario_fim());
            $stm->bindValue(5, $horario_profissional->getDuracao());
            $stm->bindValue(6, $horario_profissional->getProfissional_id());
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
        //update where DIA_SEMANA = ? AND PERIODO = ? AND PROFISSIONAL_ID = ?

        $sql = "UPDATE HORARIOS_PROFISSIONAIS SET DIA_SEMANA = ?, PERIODO = ?, HORA_INICIO = ?, HORA_FIM = ?, DURACAO = ?, PROFISSIONAL_ID = ? WHERE DIA_SEMANA = ? AND PERIODO = ? AND PROFISSIONAL_ID = ?";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $horario_profissional->getDia_semana());
            $stm->bindValue(2, $horario_profissional->getPeriodo());
            $stm->bindValue(3, $horario_profissional->getHorario_inicio());
            $stm->bindValue(4, $horario_profissional->getHorario_fim());
            $stm->bindValue(5, $horario_profissional->getDuracao());
            $stm->bindValue(6, $horario_profissional->getProfissional_id());
            $stm->bindValue(7, $horario_profissional->getDia_semana());
            $stm->bindValue(8, $horario_profissional->getPeriodo());
            $stm->bindValue(9, $horario_profissional->getProfissional_id());
            $stm->execute();
            $this->db = null;
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function buscarID($id_profissional)
    {
        $sql = "SELECT ID_HORARIO, DIA_SEMANA, PERIODO, HORA_INICIO, HORA_FIM, DURACAO, PROFISSIONAIS.ID_PROFISSIONAL, ID_PROFISSIONAL, 
                REGISTROCLASSEPROFISSIONAL, PESSOA_ID, TIPO_PROFISSIONAL_ID, PESSOAS.NOME, ESPECIALIDADES.DESCRITIVO, ESPECIALIDADES.TIPO
                FROM HORARIOS_PROFISSIONAIS
                LEFT JOIN PROFISSIONAIS ON HORARIOS_PROFISSIONAIS.PROFISSIONAL_ID = PROFISSIONAIS.ID_PROFISSIONAL
                LEFT JOIN PESSOAS ON PROFISSIONAIS.PESSOA_ID = PESSOAS.ID_PESSOA
                LEFT JOIN PROFISSIONAL_ESPECIALISTA ON PROFISSIONAL_ESPECIALISTA.PROFISSIONAL_ID = PROFISSIONAIS.ID_PROFISSIONAL
                LEFT JOIN ESPECIALIDADES ON ESPECIALIDADES.ID_ESPECIALIDADE = PROFISSIONAL_ESPECIALISTA.ESPECIALIDADE_ID
                WHERE PROFISSIONAIS.ID_PROFISSIONAL = ? AND HORA_INICIO IS NOT NULL AND HORA_FIM IS NOT NULL
                GROUP BY DIA_SEMANA, PERIODO";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $id_profissional);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }

    public function listar()
    {
        $sql = "SELECT * 
                FROM HORARIOS_PROFISSIONAIS
                GROUP BY DIA_SEMANA, PERIODO";
        try {
            $stm = $this->db->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }
}
