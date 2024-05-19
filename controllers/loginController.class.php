<?php

class LoginController extends LayoutLoginController
{
    public function index()
    {
        $data['title'] = 'Login';
        $this->render('views/login');
    }
}