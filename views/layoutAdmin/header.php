<?php
$uri = explode("/", $_SERVER['REQUEST_URI']);
$currentpage = $uri[sizeof($uri) - 1];
?>

<script>
    var base_url = "<?= Utils::base_url() ?>";
</script>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vitas - Agendamento</title>
    <link rel="stylesheet" href="<?= Utils::base_url('style.css') ?>" />
    <link rel="stylesheet" href="<?= Utils::base_url('assets/admin/css/admin.css') ?>" />
    <link rel="shortcut icon" href="./static/images/logo_menorSvg.svg" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
</head>

<body>
    <header>
        <div class="container">
            <div class="content_nav">
                <div class="logo-top">
                    <a href="<?= Utils::base_url('perfil') ?>">
                        <img src="<?= Utils::base_url('static/images/Logo-vitas.svg') ?>" />
                    </a>
                </div>
                <div class="header-info">
                    <span>
                        <img src="<?= Utils::base_url('static/images/zapp.svg') ?>" />
                        <a href="https://api.whatsapp.com/send?phone=55<?= str_replace(['(', ')', '-', ' '], '', $clinicainfos['WHATSAPP']) ?? '1234567890' ?>"><?= $clinicainfos['WHATSAPP'] ?? '123-456-7890' ?></a>
                    </span>
                    <span class="bem_vindo"><small>Bem vindo! <u><?= $_SESSION['user_name'] ?></u> <a href="logout">(sair)</a></small></span>
                </div>
            </div>
        </div>
    </header>
    <div id="loading-indicator" style="display:none">
        <div>Carregando...</div>
    </div>
    <div class="panel">
        <div class="container">
            <div class="conteudo_admin">
                <div class="menu_content">
                    <div class="mobile_box">
                        <div class="menu_mobi">
                            <div class="menu-btn-1" onclick="menuBtnFunction(this)">
                                <span></span>
                            </div>
                        </div>
                    </div>
                    <div class="menu">
                        <ul>
                            <?php foreach ($this->menu as $item) : ?>
                                <?php if (in_array($_SESSION['user_tipo'], $item[2])) : ?>
                                    <li><a href="<?= Utils::base_url($item[1]) ?>" class="<?php echo $currentpage == $item[1] ? 'checked_link' : ''; ?>"><?= $item[0] ?></a></li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>