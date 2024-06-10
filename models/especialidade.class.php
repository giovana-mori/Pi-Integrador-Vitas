<?php

class Especialidade
{
    private int $id_especialidade;
    private string $descricao;
    private string $tipo;
    public function __construct(int $id_especialidade = 0, string $descricao = "", string $tipo = "")
    {
        $this->descricao = $descricao;
        $this->tipo = $tipo;
    }

    public function getIdEspecialidade()
    {
        return $this->id_especialidade;
    }
    public function getDescricao()
    {
        return $this->descricao;
    }
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }
    public function getTipo()
    {
        return $this->tipo;
    }
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }
}

// Agregação