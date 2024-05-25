<?php

class Profissional extends Pessoa
{
    private $especialidades;
    public function __construct(private int $id_profissional = 0, private Tipo_profissional $tipo_profissional, private string $registroProfissional = "")
    {
        $this->id_profissional = $id_profissional;
        $this->registroProfissional = $registroProfissional;
        $this->tipo_profissional = $tipo_profissional;
    }
    public function getId_profissional()
    {
        return $this->id_profissional;
    }
    public function setId_profissional($id_profissional)
    {
        $this->id_profissional = $id_profissional;
    }
    public function getRegistroProfissional()
    {
        return $this->registroProfissional;
    }
    public function setRegistroProfissional($registroProfissional)
    {
        $this->registroProfissional = $registroProfissional;
    }
    public function getTipo_profissional()
    {
        return $this->tipo_profissional;
    }
    public function setTipo_profissional($tipo_profissional)
    {
        $this->tipo_profissional = $tipo_profissional;
    }
    public function getEspecialidade()
    {
        return $this->especialidades;
    }

    public function setEspecialidade($descricao, $tipo)
    {
        $especialidade = new Especialidade($descricao, $tipo);
        $this->especialidades = $especialidade;
    }
}
