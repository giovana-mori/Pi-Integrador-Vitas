<?php

class NotFoundController
{
    public function render()
    {
        extract(array(
            'title' => 'Pagina Não Econtrada'
        ));
        include_once 'views/layoutNotFound/header.php';
        include_once 'views/404.php';
    }
}