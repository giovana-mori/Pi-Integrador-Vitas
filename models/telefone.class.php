<?php

class Telefone
{
    public function __construct(private string $ddd = "", private string $numero = "", private int $pessoa_id)
    {
        $this->ddd = $ddd;
        $this->numero = $numero;
        $this->pessoa_id = $pessoa_id;
    }
    public function getDdd()
    {
        return $this->ddd;
    }
    public function getPessoaId()
    {
        return $this->pessoa_id;
    }
    public function setDdd($ddd)
    {
        $this->ddd = $ddd;
    }
    public function getNumero()
    {
        return $this->numero;
    }
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }
    public function setPessoaId($pessoa_id)
    {
        $this->pessoa_id = $pessoa_id;
    }
}

// Composição