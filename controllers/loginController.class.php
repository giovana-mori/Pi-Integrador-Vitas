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

    public function forgot()
    {
        Utils::sendEmailPHPMailer();
        // exit;
        // if (isset($_GET['email'])) {
        //     $data['title'] = 'Enviamos um e-mail para você';
        //     $email = $_GET['email'];
        //     $pessoa = new PessoaDAO();
        //     $retorno = $pessoa->checkEmail($email);
        //     $data['retorno'] = $retorno;
        //     $this->render('views/checkEmail', $data);
        // } else {
        //     $data['title'] = 'Esqueci minha senha';
        //     $this->render('views/recuperarSenha', $data);
        // }
    }

    public function checkEmail()
    {
        $email = $_GET['email'];

        $pessoa = new PessoaDAO();
        $retorno = $pessoa->checkEmail($email);

        echo json_encode($retorno);
    }

    public function logout()
    {
        $pessoa = new PessoaDAO();
        $pessoa->logout();
        header("Location: login");
    }
}
