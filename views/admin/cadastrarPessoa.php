<div class="content_ content_perfil">
    <div class="bloco_titulo">
        <h3 class="title_admin">
            <?= $title ?>
        </h3>
    </div>
    <form id="perfil_form" method="post" action="">
        <div class="itens_split">
            <div class="">
                <!--input de imagem-->
                <div class="item_form">
                    <label class="imagem">
                        <input type="file" name="profileImage" id="profileImage">
                        <div class="img_perfil">
                            <img src="https://static.vecteezy.com/system/resources/previews/013/042/571/original/default-avatar-profile-icon-social-media-user-photo-in-flat-style-vector.jpg" class="imagePreview" alt="imagem do perfil">
                            <p>Carregar Imagem</p>
                        </div>
                    </label>
                </div>
            </div>
            <div class="content_item_form">
                <div class="item_form">
                    <label for="name">Nome</label>
                    <input type="text" name="name" id="name" value="" required>
                </div>
                <div class="item_form">
                    <label for="name">CPF</label>
                    <input type="text" name="cpf" id="cpf" value="" required>
                </div>
                <div class="itens_split">
                    <div class="item_form">
                        <label for="name">Data de Nascimento</label>
                        <input type="date" name="datanasc" id="datanasc" value="" required>
                    </div>
                    <div class="item_form">
                        <label for="name">Genero</label>
                        <select name="genero" id="genero" required>
                            <option hidden="true" value="">Selecione um Genero</option>
                            <option value="M">Masculino</option>
                            <option value="F">Feminino</option>
                        </select>
                    </div>
                </div>
                <div class="item_form">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" value="" required>
                </div>
            </div>
        </div>
        <div class="item_form">
            <label for="cep">CEP</label>
            <input type="text" name="cep" id="cep" value="" required>
        </div>
        <div class="item_form">
            <label for="logradouro">Endereço/Numero</label>
            <input type="text" name="logradouro" id="logradouro" value="" required>
        </div>
        <div class="item_form">
            <label for="name">Bairro</label>
            <input type="text" name="bairro" id="bairro" value="" required>
        </div>
        <div class="item_form">
            <label for="cidade">Estado</label>
            <select name="estado" id="estado" onchange="popularCidades(this.value)" required>
                <option hidden="true" value="">Selecione um Estado</option>
                <?php
                foreach ($estados as $estado) {
                    echo "<option value='{$estado['sigla']}'>{$estado['nome']}</option>";
                }
                ?>
            </select>
        </div>
        <div class="item_form">
            <label for="cidade">Cidade</label>
            <select name="cidade" id="cidade" required>
                <option hidden="true" value="">Selecione uma Cidade</option>
            </select>
        </div>
        <button class="btn center" type="submit">Cadastrar Cliente</button>
    </form>
</div>