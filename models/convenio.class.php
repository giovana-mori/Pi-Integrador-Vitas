<?php

class Convenio
{
    public function __construct(private int $id_convenio = 0, private string $convenio = "")
    {
        $this->id_convenio = $id_convenio;
        $this->convenio = $convenio;
    }
    public function getIdConvenio()
    {
        return $this->id_convenio;
    }
    public function setIdConvenio($id_convenio)
    {
        $this->id_convenio = $id_convenio;
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
