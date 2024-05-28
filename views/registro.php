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
                    <form id="register_form" method="post">
                        <div class="item_form">
                            <label for="name">Nome</label>
                            <input type="text" name="name" id="name" required>
                        </div>
                        <div class="item_form">
                            <label for="name">CPF</label>
                            <input type="text" name="cpf" id="cpf" required>
                        </div>
                        <div class="item_form">
                            <label for="name">Data de Nascimento</label>
                            <input type="date" name="datanasc" id="datanasc" required>
                        </div>
                        <div class="item_form">
                            <label for="name">Genero</label>
                            <select name="genero" id="genero" required>
                                <option hidden="true" value="">Selecione um Genero</option>
                                <option value="M">Masculino</option>
                                <option value="F">Feminino</option>
                            </select>
                        </div>
                        <div class="item_form">
                            <label for="endereco">CEP</label>
                            <input type="text" name="cep" id="cep" required>
                        </div>
                        <div class="item_form">
                            <label for="logradouro">Endereço/Numero</label>
                            <input type="text" name="logradouro" id="logradouro" required>
                        </div>
                        <div class="item_form">
                            <label for="name">Bairro</label>
                            <input type="text" name="bairro" id="bairro" required>
                        </div>
                        <div class="item_form">
                            <label for="cidade">Estado</label>
                            <select name="estado" id="estado" required>
                                <option hidden="true" value="">Selecione um Estado</option>
                            </select>
                        </div>
                        <div class="item_form">
                            <label for="cidade">Cidade</label>
                            <select name="cidade" id="cidade" required>
                                <option hidden="true" value="">Selecione uma Cidade</option>
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