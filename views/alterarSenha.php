<div class="panel">
    <div class="content_forms">
        <div class="card register_card login_card singleForm">
            <div class="content_form singleForm">
                <h3 class="header_form">
                    Digite sua nova senha
                </h3>
                <form id="login_form" action="<?= Utils::base_url('redifinirsenha') ?>" method="POST">
                    <div class="item_form">
                        <input type="hidden" name="id_pessoa" value="<?= $pessoa['ID_PESSOA'] ?>">
                        <label for="password">Nova Senha</label>
                        <input type="password" name="password" id="password" required>
                    </div>
                    <button class="btn" type="submit">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>