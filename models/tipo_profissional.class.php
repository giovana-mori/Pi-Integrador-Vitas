<?php

class Tipo_profissional
{
    public function __construct(private int $id_tipo_profissional = 0, private string $nome)
    {
        $this->id_tipo_profissional = $id_tipo_profissional;
        $this->nome = $nome;
    }

    public function getId_tipo_profissional()
    {
        return $this->id_tipo_profissional;
    }
    public function setId_tipo_profissional($id_tipo_profissional)
    {
        $this->id_tipo_profissional = $id_tipo_profissional;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
}
