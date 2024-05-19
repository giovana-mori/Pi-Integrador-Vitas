<?php

class Contato
{
    public function __construct(private int $id_paciente = 0, private int $id_contato = 0, private string $assunto = "", private string $descricao = "")
    {
        $this->assunto = $assunto;
        $this->descricao = $descricao;
        $this->id_paciente = $id_paciente;
        $this->id_contato = $id_contato;
    }
    public function getAssunto()
    {
        return $this->assunto;
    }
    public function getDescricao()
    {
        return $this->descricao;
    }
    public function setAssunto($assunto)
    {
        $this->assunto = $assunto;
    }
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }
    public function getIdPaciente()
    {
        return $this->id_paciente;
    }
    public function getIdContato()
    {
        return $this->id_contato;
    }
    public function setIdPaciente($id_paciente)
    {
        $this->id_paciente = $id_paciente;
    }
    public function setIdContato($id_contato)
    {
        $this->id_contato = $id_contato;
    }
}