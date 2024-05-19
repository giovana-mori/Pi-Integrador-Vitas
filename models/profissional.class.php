<?php

class Profissional extends Pessoa
{
    public function __construct(private int $id_profissional = 0, private string $registroProfissional = "")
    {
        $this->registroProfissional = $registroProfissional;
        $this->especialidades = [];
    }
    public function getRegistroProfissional()
    {
        return $this->registroProfissional;
    }
    public function setRegistroProfissional($registroProfissional)
    {
        $this->registroProfissional = $registroProfissional;
    }
    public function setEspecialidades($especialidades)
    {
        $this->especialidades [] = $especialidades;
    }
    public function getEspecialidades()
    {
        return $this->especialidades;
    }
    public function getIdProfissional()
    {
        return $this->id_profissional;
    }
}

// Agregação 