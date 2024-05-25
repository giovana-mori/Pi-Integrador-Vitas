<?php

class Especialidade
{
    public function __construct(private int $id_especialidade = 0, private string $descricao = "", private string $tipo = "")
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