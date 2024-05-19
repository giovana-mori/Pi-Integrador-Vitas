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
                    <span class="bem_vindo"><small>Bem vindo!</small></span>
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
                            <li><a href="agendamentos.html">Meus Agendamentos</a></li>
                            <li><a href="profissionais.html" class="checked_link">Profissionais</a></li>
                            <li><a href="contato.html">Contato</a></li>
                        </ul>
                    </div>
                </div>
                <div class="content_">
                    <div class="bloco_titulo">
                        <h3 class="title_admin">
                            PROFISSIONAIS
                        </h3>
                        <small>Conheca nossos profissionais</small>
                    </div>

                    <div class="optimization-content container">
                        <div class="optimization-content-style">
                            <div class="optimization-content-desc">
                                <div class="simbolo">
                                    <img src="static/images/profissionais/1.jpg">
                                </div>
                                <h2>Camila Santiago</h2>
                                <small>Psicologa</small>
                                <p>Guiando jornadas, construindo resiliência com comprometimento.</p>
                            </div>
                            <div class="optimization-content-desc">
                                <div class="simbolo">
                                    <img src="static/images/profissionais/2.jpg">
                                </div>
                                <h2>Rodrigo Almeida</h2>
                                <small>Enfermeiro</small>
                                <p>Promovendo saúde e bem estar com foco na humanização.</p>
                            </div>
                            <div class="optimization-content-desc">
                                <div class="simbolo">
                                    <img src="static/images/profissionais/3.jpg">
                                </div>
                                <h2>Dr. André Oliveira</h2>
                                <small>Médico</small>
                                <p>Proporcionando cuidados excepcionais que priorizam a prevenção e o bem-estar
                                    duradouro de
                                    seus pacientes.</p>
                            </div>
                            <div class="optimization-content-desc">
                                <div class="simbolo">
                                    <img src="static/images/profissionais/4.jpg">
                                </div>
                                <h2>Mariana Silva</h2>
                                <small>Nutricionista</small>
                                <p>Promovendo escolhas alimentares conscientes e um equilíbrio saudável</p>
                            </div>
                            <div class="optimization-content-desc">
                                <div class="simbolo">
                                    <img src="static/images/profissionais/5.jpg">
                                </div>
                                <h2>Beatriz Mendes</h2>
                                <small>Fisioterapeuta</small>
                                <p>Promovendo abordagem personalizada que visa a vitalidade e o bem-estar contínuos de
                                    cada
                                    indivíduo.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="overlay" id="overlay" onclick="fecharModal()"></div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale/pt-br.js"></script>
    <script src="assets/admin/js/script.js"></script>
</body>

</html>