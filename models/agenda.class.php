<?php

class Agenda
{
    private int $id_agenda;
    private string $data;
    private string $hora;
    private string $duracao;
    private int $id_pessoa;
    private int $id_profissional;
    private string $observacoes;
    private bool $facultativo;
    private string $status;
    public function __construct(int $id_agenda = 0, string $data = "", string $hora = '',  string $duracao = "", int $id_pessoa = 0, int $id_profissional = 0, string $observacoes = "", bool $facultativo = false, string $status = 'NÃO')
    {
        $this->id_agenda = $id_agenda;
        $this->data = $data;
        $this->hora = $hora;
        $this->duracao = $duracao;
        $this->id_pessoa = $id_pessoa;
        $this->id_profissional = $id_profissional;
        $this->observacoes = $observacoes;
        $this->status = $status;
    }
    public function getIdAgenda()
    {
        return $this->id_agenda;
    }
    public function getData()
    {
        return $this->data;
    }
    public function getHora()
    {
        return $this->hora;
    }
    public function getDuracao()
    {
        return $this->duracao;
    }
    public function getIdPessoa()
    {
        return $this->id_pessoa;
    }
    public function getIdProfissional()
    {
        return $this->id_profissional;
    }
    public function getObservacoes()
    {
        return $this->observacoes;
    }
    public function getFacultativo()
    {
        return $this->facultativo;
    }
    public function getStatus()
    {
        return $this->status;
    }
    public function setIdAgenda($id_agenda)
    {
        $this->id_agenda = $id_agenda;
    }
    public function setData($data)
    {
        $this->data = $data;
    }
    public function setHora($hora)
    {
        $this->hora = $hora;
    }
    public function setDuracao($duracao)
    {
        $this->duracao = $duracao;
    }
    public function setIdPessoa($id_pessoa)
    {
        $this->id_pessoa = $id_pessoa;
    }
    public function setIdProfissional($id_profissional)
    {
        $this->id_profissional = $id_profissional;
    }
    public function setObservacoes($observacoes)
    {
        $this->observacoes = $observacoes;
    }
    public function setFacultativo($facultativo)
    {
        $this->facultativo = $facultativo;
    }
    public function setStatus($status)
    {
        $this->status = $status;
    }
}
