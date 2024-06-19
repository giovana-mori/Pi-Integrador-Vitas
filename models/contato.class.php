<?php

class Contato
{
    public function __construct(private int $id_contato = 0, private int $id_pessoa = 0, private string $assunto = "", private string $descricao = "")
    {
        $this->assunto = $assunto;
        $this->descricao = $descricao;
        $this->id_pessoa = $id_pessoa;
        $this->id_contato = $id_contato;
    }
    public function getAssunto()
    {
        return $this->assunto;
    }
    public function getDescricao()
    {
        return $this->descricao;
    }
    public function setAssunto($assunto)
    {
        $this->assunto = $assunto;
    }
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }
    public function getIdPessoa()
    {
        return $this->id_pessoa;
    }
    public function getIdContato()
    {
        return $this->id_contato;
    }
    public function setIdPessoa($id_pessoa)
    {
        $this->id_pessoa = $id_pessoa;
    }
    public function setIdContato($id_contato)
    {
        $this->id_contato = $id_contato;
    }
}
