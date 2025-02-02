<?php

class Pessoa
{
    private $telefones;
    private $convenios;
    private int $id_pessoa;
    private string $nome;
    private string $cpf;
    private string $dataNasc;
    private string $genero;
    private string $email;
    private string $senha;
    private string $foto;
    private string $cep;
    private string $logradouro;
    private string $bairro;
    private string $estado;
    private string $cidade;
    private string $telefone1;
    private string $telefone2;
    public function __construct(int $id_pessoa = 0, string $nome = "", string $cpf = "", string $dataNasc = "", string $genero = "", string $email = "", string $senha = "", string $foto = "", string $cep = "", string $logradouro = "", string $bairro = "", string $estado = "", string $cidade = "", string $telefone1 = "", string $telefone2 = "")
    {
        $this->id_pessoa = $id_pessoa;
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->dataNasc = $dataNasc;
        $this->genero = $genero;
        $this->email = $email;
        $this->senha = $senha;
        $this->foto = $foto;
        $this->cep = $cep;
        $this->logradouro = $logradouro;
        $this->bairro = $bairro;
        $this->estado = $estado;
        $this->cidade = $cidade;
        $this->telefone1 = $telefone1;
        $this->telefone2 = $telefone2;
    }

    public function getId_pessoa()
    {
        return $this->id_pessoa;
    }

    public function getNome()
    {
        return $this->nome;
    }
    public function getCpf()
    {
        return $this->cpf;
    }
    public function getDataNasc()
    {
        return $this->dataNasc;
    }
    public function getGenero()
    {
        return $this->genero;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getSenha()
    {
        return $this->senha;
    }
    public function getFoto()
    {
        return $this->foto;
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
    public function getTelefone1()
    {
        return $this->telefone1;
    }
    public function getTelefone2()
    {
        return $this->telefone2;
    }
    public function getConvenios()
    {
        return $this->convenios;
    }
    public function setId_pessoa($id_pessoa)
    {
        $this->id_pessoa = $id_pessoa;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }
    public function setDataNasc($dataNasc)
    {
        $this->dataNasc = $dataNasc;
    }
    public function setGenero($genero)
    {
        $this->genero = $genero;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }
    public function setFoto($foto)
    {
        $this->foto = $foto;
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
    public function setTelefone1($telefone1)
    {
        $this->telefone1 = $telefone1;
    }

    public function setTelefone2($telefone2)
    {
        $this->telefone2 = $telefone2;
    }
    public function setConvenios($nome)
    {
        $convenio = new Convenio($nome);
        $this->convenios[] = $convenio;
    }
}
