<div class="panel">
    <div class="content_forms">
        <div class="card register_card login_card">
            <div class="flex_card login_flex">
                <div class="division_left">
                    <h4>Ainda não tem conta?</h4>
                    <a href="registro" class="btn_entrar_registro">Registrar</a>
                </div>
                <div class="dividir"></div>
                <div class="content_form">
                    <h3 class="header_form">
                        Login
                    </h3>
                    <form id="login_form" method="GET">
                        <div class="item_form">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" id="email" required>
                        </div>
                        <div class="item_form">
                            <label for="email">Senha</label>
                            <input type="password" name="password" id="password" required>
                        </div>
                        <div class="item_form">
                            <a href="<?= Utils::base_url('esquecisenha') ?>" class="link">Esqueceu a senha?</a>
                        </div>
                        <button class="btn" type="submit">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>