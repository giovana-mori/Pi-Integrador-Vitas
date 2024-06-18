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
        if (isset($_GET['email'])) {
            $data['title'] = 'Enviamos um e-mail para você';
            $email = $_GET['email'];
            $pessoa = new PessoaDAO();
            $retorno = $pessoa->checkEmail($email);
            //if exists $retorno['EMAIL'],  send email phpmailer

            if (isset($retorno['EMAIL'])) {
                $token = $pessoa->generateToken($retorno["ID_PESSOA"]);
                Utils::sendEmailPHPMailer($retorno['NOME'], $retorno['EMAIL'], 'Recuperação/Alteração de Senha - VITAS', Utils::getTemplateRecuperacaoSenha($token));
            }
            $this->render('views/checkEmail', $data);
        } else {
            $data['title'] = 'Esqueci minha senha';
            $this->render('views/recuperarSenha', $data);
        }
    }

    public function checkEmail()
    {
        $email = $_GET['email'];

        $pessoa = new PessoaDAO();
        $retorno = $pessoa->checkEmail($email);

        echo json_encode($retorno);
    }

    public function redifinirSenha()
    {
        if (isset($_GET['token'])) {
            $token = $_GET['token'];
            $pessoaDAO = new PessoaDAO();
            $pessoa = $pessoaDAO->buscarToken($token);
            if ($pessoa) {
                $data['title'] = 'Alterar Senha';
                $data['pessoa'] = $pessoa;
                $this->render('views/alterarSenha', $data);
            } else {
                header("Location: " . Utils::base_url('login'));
            }
        } else {
            header("Location: " . Utils::base_url('login'));
        }
    }

    //update senha
    public function alterarSenha()
    {
        if (isset($_POST['password']) && isset($_POST['id_pessoa'])) {
            $id_pessoa = $_POST['id_pessoa'];
            $senha = password_hash($_POST['password'], PASSWORD_BCRYPT);

            $pessoaDAO = new PessoaDAO();
            if ($pessoaDAO->updateSenha($id_pessoa, $senha))
                header("Location: " . Utils::base_url('login') . '?mensagem_sucesso=Senha Alterada com Sucesso!');
            else
                header("Location: " . Utils::base_url('login') . '?mensagem_erro=Erro ao Alterar Senha!');
        } else {
            header("Location: " . Utils::base_url('login'));
        }
    }

    public function logout()
    {
        $pessoa = new PessoaDAO();
        $pessoa->logout();
        header("Location: login");
    }
}
