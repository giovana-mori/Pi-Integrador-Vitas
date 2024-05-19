<?php

class Telefone
{
    public function __construct(private string $ddd = "", private string $numero = "")
    {
       
        $this->ddd = $ddd;
        $this->numero = $numero;
    }
    public function getDdd()
    {
        return $this->ddd;
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

}

// Composição