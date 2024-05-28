<?php

abstract class layoutAdminController extends AuthController
{
    public function __construct()
    {
        parent::checkLoggedUser();
    }

    public function render($nameView, $data = array())
    {
        extract($data);
        include_once 'views/layoutAdmin/header.php';
        include_once $nameView . '.php';
        include_once 'views/layoutAdmin/footer.php';
    }
}
