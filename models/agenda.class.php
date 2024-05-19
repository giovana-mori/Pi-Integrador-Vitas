<?php

class Agenda
{
    public function __construct(private string $data = "", public string $duracao = "", public string $disponibilidade = "", private int $id_profissional = 0)
    {
        $this->data = $data;
        $this->duracao = $duracao;
        $this->disponibilidade = $disponibilidade;
        $this->id_profissional = $id_profissional;
    }

    public function getData()
    {
        return $this->data;
    }
    public function setData($data)
    {
        $this->data = $data;
    }
    public function getDuracao()
    {
        return $this->duracao;
    }
    public function setDuracao($duracao)
    {
        $this->duracao = $duracao;
    }
    public function getDisponibilidade()
    {
        return $this->disponibilidade;
    }
    public function setDisponibilidade($disponibilidade)
    {
        $this->disponibilidade = $disponibilidade;
    }
    public function getIdProfissional()
    {
        return $this->id_profissional;
    }
    public function setIdProfissional($id_profissional)
    {
        $this->id_profissional = $id_profissional;
    }

}