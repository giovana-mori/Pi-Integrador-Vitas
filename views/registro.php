<div class="panel">
    <div class="content_forms">
        <div class="card register_card">
            <div class="flex_card">
                <div class="division_left">
                    <h4>Já tem conta?</h4>
                    <a href="login" class="btn_entrar_registro">Entrar</a>
                </div>
                <div class="dividir"></div>
                <div class="content_form">
                    <h3 class="header_form">
                        Cadastrar
                    </h3>
                    <form id="register_form" method="get">
                        <div class="item_form">
                            <label for="name">Nome</label>
                            <input type="text" name="name" id="name" required>
                        </div>
                        <div class="item_form">
                            <label for="endereco">Endereço/Numero</label>
                            <input type="text" name="endereco" id="endereco" required>
                        </div>
                        <div class="item_form">
                            <label for="name">Bairro</label>
                            <input type="text" name="bairro" id="bairro" required>
                        </div>
                        <div class="item_form">
                            <label for="cidade">Estado</label>
                            <select name="estado" id="estado" required>
                                <option disabled>Selecione um Estado</option>
                            </select>
                        </div>
                        <div class="item_form">
                            <label for="cidade">Cidade</label>
                            <select name="cidade" id="cidade" required>
                                <option disabled>Selecione uma Cidade</option>
                            </select>
                        </div>
                        <div class="item_form">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" id="email" required>
                        </div>
                        <div class="item_form">
                            <label for="email">Senha</label>
                            <input type="password" name="senha" id="senha" required>
                        </div>
                        <button class="btn" type="submit">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>