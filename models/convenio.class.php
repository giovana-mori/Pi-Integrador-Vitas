<?php

class Convenio
{
    public function __construct(private string $convenio = "")
    {
        $this->convenio = $convenio;
    }
    public function getConvenio()
    {
        return $this->convenio;
    }
    public function setConvenio($convenio)
    {
        $this->convenio = $convenio;
    }
}