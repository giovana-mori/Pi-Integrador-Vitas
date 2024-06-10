<?php

class Clinica
{
    public function __construct(private int $id_clinica = 0, private string $nome = "", private string $cnpj = "", private string $inscricao_estadual = "", private string $email = "", private string $logo = "", private string $cep = "", private string $logradouro = "", private string $bairro = "", private string $estado = "", private string $cidade = "", private string $segunda = "", private string $terca = "", private string $quarta = "", private string $quinta = "", private string $sexta = "", private string $sabado = "", private string $domingo = "", private bool $feriados = false)
    {
        $this->nome = $nome;
        $this->cnpj = $cnpj;
        $this->inscricao_estadual = $inscricao_estadual;
        $this->email = $email;
        $this->logo = $logo;
        $this->cep = $cep;
        $this->logradouro = $logradouro;
        $this->bairro = $bairro;
        $this->estado = $estado;
        $this->cidade = $cidade;
        $this->segunda = $segunda;
        $this->terca = $terca;
        $this->quarta = $quarta;
        $this->quinta = $quinta;
        $this->sexta = $sexta;
        $this->sabado = $sabado;
        $this->domingo = $domingo;
        $this->feriados = $feriados;
    }
    public function getIdClinica()
    {
        return $this->id_clinica;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function getCnpj()
    {
        return $this->cnpj;
    }
    public function getInscricaoEstadual()
    {
        return $this->inscricao_estadual;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getLogo()
    {
        return $this->logo;
    }
    public function getCep()
    {
        return $this->cep;
    }
    public function getLogradouro()
    {
        return $this->logradouro;
    }
    public function getBairro()
    {
        return $this->bairro;
    }
    public function getEstado()
    {
        return $this->estado;
    }
    public function getCidade()
    {
        return $this->cidade;
    }
    public function getSegunda()
    {
        return $this->segunda;
    }
    public function getTerca()
    {
        return $this->terca;
    }
    public function getQuarta()
    {
        return $this->quarta;
    }
    public function getQuinta()
    {
        return $this->quinta;
    }
    public function getSexta()
    {
        return $this->sexta;
    }
    public function getSabado()
    {
        return $this->sabado;
    }
    public function getDomingo()
    {
        return $this->domingo;
    }
    public function getFeriados()
    {
        return $this->feriados;
    }
    public function setIdClinica($id_clinica)
    {
        $this->id_clinica = $id_clinica;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;
    }
    public function setInscricaoEstadual($inscricao_estadual)
    {
        $this->inscricao_estadual = $inscricao_estadual;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setLogo($logo)
    {
        $this->logo = $logo;
    }
    public function setCep($cep)
    {
        $this->cep = $cep;
    }
    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;
    }
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
    }
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }
    public function setSegunda($segunda)
    {
        $this->segunda = $segunda;
    }
    public function setTerca($terca)
    {
        $this->terca = $terca;
    }
    public function setQuarta($quarta)
    {
        $this->quarta = $quarta;
    }
    public function setQuinta($quinta)
    {
        $this->quinta = $quinta;
    }
    public function setSexta($sexta)
    {
        $this->sexta = $sexta;
    }

    public function setSabado($sabado)
    {
        $this->sabado = $sabado;
    }
    public function setDomingo($domingo)
    {
        $this->domingo = $domingo;
    }
    public function setFeriados($feriados)
    {
        $this->feriados = $feriados;
    }
}
