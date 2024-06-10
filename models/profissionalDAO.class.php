<?php

class ProfissionalDAO extends Conexao
{
    public function __construct()
    {
        parent::__construct();
    }

    public function inserir(Profissional $profissional)
    {
        $sql = "INSERT INTO profissional (registroProfissional) VALUES (?)";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(1, $profissional->getRegistroProfissional());
            $stmt->execute();
            $id_profissional = $this->db->lastInsertId();
            $this->db = null;
            return $id_profissional;
        } catch (PDOException $e) {
            return 0;
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
