<?php

class NotFoundController
{
    public function render()
    {
        include_once 'views/layoutNotFound/header.php';
        include_once 'views/404.php';
    }
}