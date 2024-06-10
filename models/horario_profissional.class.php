<?php

class Horario_profissional
{
    public function __construct(private int $id_horario = 0, private string $dia_semana = "", private string $horario_inicio = "", private string $horario_fim = "", private int $duracao, private int $profissional_id = 0)
    {
        $this->dia_semana = $dia_semana;
        $this->horario_inicio = $horario_inicio;
        $this->horario_fim = $horario_fim;
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
}

// Agregação