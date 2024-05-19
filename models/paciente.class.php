<?php


class Paciente extends Pessoa
{
    public function __construct(private int $id_paciente = 0, private array $convenios = [], private int $id_pessoa = 0 )
    {
        $this->convenios = [];
    }
    public function getConvenio()
    {
        return $this->convenios;
    }
    public function setConvenio($convenio)
    {
        $this->convenios[] = $convenio;
    }
    public function getId_paciente()
    {
        return $this->id_paciente;
    }
    public function getId_pessoa()
    {
        return $this->id_pessoa;
    }
}
