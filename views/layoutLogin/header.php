<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="assets/admin/css/style.css" />
    <link rel="shortcut icon" href="./static/images/logo_menorSvg.svg" type="image/x-icon" />
</head>

<body>
    <header>
        <div class="container">
            <div class="content_nav">
                <div class="logo-top">
                    <a href="./">
                        <img src="static/images/Logo-vitas.svg" />
                    </a>
                </div>
                <menu>
                    <li><a href="./#sobre">Sobre</a></li>
                    <li><a href="./#profissionais">Profissionais</a></li>
                    <li><a href="./#depoimentos">Depoimentos</a></li>
                    <li><a href="./#faq">FAQ</a></li>
                </menu>
                <div class="header-info">
                    <span><img src="static/images/zapp.svg" />
                        <a href="https://api.whatsapp.com/send?phone=55<?= str_replace(['(', ')', '-', ' '], '', $clinica['WHATSAPP']) ?? '1234567890' ?>"><?= $clinica['WHATSAPP'] ?? '123-456-7890' ?></a>
                    </span>
                    <div class="link-nav">
                        <a href="login"><button class="botao-sfun">ENTRAR</button></a>
                        <a href="registro"><button class="botao">CADASTRAR</button></a>
                    </div>
                </div>
            </div>
    </header>