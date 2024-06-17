<?php

class LoginController extends LayoutLoginController
{
    public function index()
    {
        $data['title'] = 'Login';

        //get all input from GET page
        if (isset($_GET['email']) && isset($_GET['password'])) {
            $email = $_GET['email'];
            $password = $_GET['password'];

            $pessoa = new PessoaDAO();
            $data['retorno'] = $pessoa->login($email, $password);

            if ($data['retorno']['status'] == 'success') {
                header("Location: perfil");
            }
        }

        $this->render('views/login', $data);
    }

    public function logout()
    {
        $pessoa = new PessoaDAO();
        $pessoa->logout();
        header("Location: login");
    }
}
