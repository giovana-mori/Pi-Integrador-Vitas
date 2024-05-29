<?php

abstract class AuthController
{
    public function checkLoggedUser()
    {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: login");
            exit();
        }
    }
}