<?php

class Especialidade {
    public function __construct( private string $descricao = "", private string $tipo = "")
    {
        $this->descricao = $descricao;
        $this->tipo = $tipo;
    }

    public function getDescricao() {
        return $this->descricao;
    }
    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
    public function getTipo() {
        return $this->tipo;
    }
    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }
}

// Agregação