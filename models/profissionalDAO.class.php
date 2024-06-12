<?php

class ProfissionalDAO extends Conexao
{
    public function __construct()
    {
        parent::__construct();
    }

    public function inserir(Profissional $profissional)
    {
        //insert this values `REGISTROCLASSEPROFISSIONAL`, `PESSOA_ID`, `TIPO_PROFISSIONAL_ID`
        $sql = "INSERT INTO PROFISSIONAIS (registroclasseprofissional, pessoa_id, tipo_profissional_id) VALUES (?,?,?)";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(1, $profissional->getRegistroProfissional());
            $stmt->bindValue(2, $profissional->getId_pessoa());
            $stmt->bindValue(3, $profissional->getTipo_profissional());
            $stmt->execute();
            $id_profissional = $this->db->lastInsertId();
            // $this->db = null;
            return $id_profissional;
        } catch (PDOException $e) {
            return 0;
        }
    }

    public function inserirEspecialidade($profissional)
    {
        $sql = "INSERT INTO PROFISSIONAL_ESPECIALISTA (PROFISSIONAL_ID, ESPECIALIDADE_ID) VALUES (?, ?)";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(1, $profissional->getId_profissional());
            $stmt->bindValue(2, $profissional->getEspecialidade());
            $stmt->execute();
            $id_especialidade_profissional = $this->db->lastInsertId();
            // $this->db = null;
            return $id_especialidade_profissional;
        } catch (PDOException $e) {
            return $e;
        }
    }

    public function buscarID($id = null)
    {
        $sql = "SELECT PROF.id_profissional,PROF.PESSOA_ID, PE.NOME, PROF.registroclasseprofissional, TPROF.NOME AS tipo, ESP.descritivo
                FROM PESSOAS PE
                LEFT JOIN PROFISSIONAIS PROF ON PROF.PESSOA_ID = PE.ID_PESSOA
                LEFT JOIN TIPO_PROFISSIONAL TPROF ON TPROF.ID_TIPO_PROFISSIONAL = PROF.TIPO_PROFISSIONAL_ID
                LEFT JOIN PROFISSIONAL_ESPECIALISTA PROFE ON PROFE.PROFISSIONAL_ID = PROF.ID_PROFISSIONAL
                LEFT JOIN ESPECIALIDADES ESP ON ESP.ID_ESPECIALIDADE = PROFE.ESPECIALIDADE_ID
                WHERE PROF.ID_PROFISSIONAL = ?";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->db = null;
            return $result;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function listarProfissionais()
    {
        $sql = "SELECT PROF.id_profissional, PE.nome, PROF.registroclasseprofissional, TPROF.nome AS tipo, ESP.descritivo
                FROM PESSOAS PE
                LEFT JOIN PROFISSIONAIS PROF ON PROF.PESSOA_ID = PE.ID_PESSOA
                LEFT JOIN TIPO_PROFISSIONAL TPROF ON TPROF.ID_TIPO_PROFISSIONAL = PROF.TIPO_PROFISSIONAL_ID
                LEFT JOIN PROFISSIONAL_ESPECIALISTA PROFE ON PROFE.PROFISSIONAL_ID = PROF.ID_PROFISSIONAL
                LEFT JOIN ESPECIALIDADES ESP ON ESP.ID_ESPECIALIDADE = PROFE.ESPECIALIDADE_ID
                WHERE PROF.TIPO_PROFISSIONAL_ID = 2";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->db = null;
            return $result;
        } catch (PDOException $e) {
            return [];
        }
    }
}
