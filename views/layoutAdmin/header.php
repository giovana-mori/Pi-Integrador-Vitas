<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vitas - Agendamento</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="assets/admin/css/admin.css" />
    <link rel="shortcut icon" href="./static/images/logo_menorSvg.svg" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
    
</head>

<body>
    <header>
        <div class="container">
            <div class="content_nav">
                <div class="logo-top">
                    <img src="static/images/Logo-vitas.svg" />
                </div>
                <div class="header-info">
                    <span>
                        <img src="static/images/zapp.svg" />
                        <a href="tel:123-456-7890">123-456-7890</a>
                    </span>
                    <span class="bem_vindo"><small>Bem vindo! <u><?= $_SESSION['user_name']?></u> <a href="logout">(sair)</a></small></span>
                </div>
            </div>
        </div>
    </header>
    <div class="panel">
        <div class="container">
            <div class="conteudo_admin">
                <div class="menu_content">
                    <div class="menu">
                        <ul>
                            <li><a href="agendamentos" class="checked_link">Meus Agendamentos</a></li>
                            <li><a href="contato">Contato</a></li>
                        </ul>
                    </div>
                </div>