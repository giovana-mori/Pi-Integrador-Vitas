<?php

class APIController
{
    public function pessoas()
    {
        header('Content-Type: application/json');
        try {
            $pessoas = new PessoaDAO();
            echo json_encode($pessoas->listar());
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
