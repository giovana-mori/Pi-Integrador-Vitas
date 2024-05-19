<div class="panel">
    <div class="content_forms">
        <div class="card register_card">
            <div class="flex_card">
                <div class="division_left">
                    <h4>Ainda não tem conta?</h4>
                    <a href="registro" class="btn_entrar_registro">Registrar</a>
                </div>
                <div class="dividir"></div>
                <div class="content_form">
                    <h3 class="header_form">
                        Entrar
                    </h3>
                    <form id="login_form" method="get">
                        <div class="item_form">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" id="email" required>
                        </div>
                        <div class="item_form">
                            <label for="email">Senha</label>
                            <input type="password" name="senha" id="senha" required>
                        </div>
                        <button class="btn" onsubmit="performLogin()" type="submit">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>