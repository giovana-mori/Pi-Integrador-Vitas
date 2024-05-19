<?php

class Agendamento
{
    public function __construct(private int $id_agendamento = 0, private int $id_agenda = 0, private int $id_paciente = 0, private string $observacoes = "", private string $status)
    {
        $this->id_agendamento = $id_agendamento;
        $this->id_agenda = $id_agenda;
        $this->id_paciente = $id_paciente;
        $this->observacoes = $observacoes;
        $this->status = $status;
    }
    public function getIdAgendamento()
    {
        return $this->id_agendamento;
    }
    public function getIdAgenda()
    {
        return $this->id_agenda;
    }
    public function getIdPaciente()
    {
        return $this->id_paciente;
    }
    public function getObservacoes()
    {
        return $this->observacoes;
    }
    public function getStatus()
    {
        return $this->status;
    }
    public function setIdAgendamento($id_agendamento)
    {
        $this->id_agendamento = $id_agendamento;
    }
    public function setIdAgenda($id_agenda)
    {
        $this->id_agenda = $id_agenda;
    }
    public function setIdPaciente($id_paciente)
    {
        $this->id_paciente = $id_paciente;
    }
    public function setObservacoes($observacoes)
    {
        $this->observacoes = $observacoes;
    }
    public function setStatus($status)
    {
        $this->status = $status;
    }
}
