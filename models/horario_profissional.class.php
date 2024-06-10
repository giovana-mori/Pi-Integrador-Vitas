<?php

class Horario_profissional
{
    private $id_horario;
    private $dia_semana;
    private $periodo;
    private $horario_inicio;
    private $horario_fim;
    private $duracao;
    private $profissional_id;
    //construtor    
    public function __construct(int $id_horario = 0, string $dia_semana = "", string $periodo = "", string $horario_inicio = "", string $horario_fim = "", int $duracao = null, int $profissional_id = 0)
    {
        $this->dia_semana = $dia_semana;
        $this->horario_inicio = $horario_inicio;
        $this->horario_fim = $horario_fim;
        $this->periodo = $periodo;
        $this->duracao = $duracao;
        $this->profissional_id = $profissional_id;
    }
    public function getId_horario()
    {
        return $this->id_horario;
    }
    public function setId_horario($id_horario)
    {
        $this->id_horario = $id_horario;
    }
    public function getDia_semana()
    {
        return $this->dia_semana;
    }
    public function setDia_semana($dia_semana)
    {
        $this->dia_semana = $dia_semana;
    }
    public function getHorario_inicio()
    {
        return $this->horario_inicio;
    }
    public function setHorario_inicio($horario_inicio)
    {
        $this->horario_inicio = $horario_inicio;
    }
    public function getHorario_fim()
    {
        return $this->horario_fim;
    }
    public function setHorario_fim($horario_fim)
    {
        $this->horario_fim = $horario_fim;
    }
    public function getDuracao()
    {
        return $this->duracao;
    }
    public function setDuracao($duracao)
    {
        $this->duracao = $duracao;
    }
    public function getProfissional_id()
    {
        return $this->profissional_id;
    }
    public function setProfissional_id($profissional_id)
    {
        $this->profissional_id = $profissional_id;
    }
    public function getPeriodo()
    {
        return $this->periodo;
    }
    public function setPeriodo($periodo)
    {
        $this->periodo = $periodo;
    }
}
