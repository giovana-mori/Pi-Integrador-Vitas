<?php

class Profissional extends Pessoa
{
    private int $id_profissional;
    private int $especialidade_id;
    private $registroProfissional;
    private $tipo_profissional;
    public function __construct(int $id_profissional = 0, $tipo_profissional = null, string $registroProfissional = "", int $especialidade_id = 0)
    {
        $this->id_profissional = $id_profissional;
        $this->registroProfissional = $registroProfissional;
        $this->tipo_profissional = $tipo_profissional;
        $this->especialidade_id = $especialidade_id;
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
        return $this->especialidade_id;
    }

    public function setEspecialidade($id_especialidade)
    {
        $this->especialidade_id = $id_especialidade;
    }
}
