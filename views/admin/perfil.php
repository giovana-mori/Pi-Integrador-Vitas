<div class="content_ content_perfil">
    <div class="bloco_titulo">
        <h3 class="title_admin">
            Meu Perfil
        </h3>
    </div>
    <form id="perfil_form" method="post" action="">
        <input type="hidden" id="id_pessoa" name="id_pessoa" value="<?= $pessoa['ID_PESSOA'] ?>">
        <div class="itens_split">
            <div class="">
                <!--input de imagem-->
                <div class="item_form">
                    <label class="imagem">
                        <input type="file" name="profileImage" id="profileImage">
                        <div class="img_perfil">
                            <img src="<?= $pessoa['FOTO'] ? Utils::base_url('uploads/') . $pessoa['FOTO'] : 'https://static.vecteezy.com/system/resources/previews/013/042/571/original/default-avatar-profile-icon-social-media-user-photo-in-flat-style-vector.jpg' ?>" class="imagePreview" alt="imagem do perfil">
                            <p>Carregar Imagem</p>
                        </div>
                    </label>
                </div>
            </div>
            <div class="content_item_form">
                <div class="item_form">
                    <label for="name">Nome</label>
                    <input type="text" name="name" id="name" value="<?= $pessoa['NOME'] ?>" required>
                </div>
                <div class="item_form">
                    <label for="name">CPF</label>
                    <input type="text" name="cpf" id="cpf" value="<?= $pessoa['CPF'] ?>" required>
                </div>
                <div class="itens_split">
                    <div class="item_form">
                        <label for="name">Data de Nascimento</label>
                        <input type="date" name="datanasc" id="datanasc" value="<?= $pessoa['DATANASC'] ?>" required>
                    </div>
                    <div class="item_form">
                        <label for="name">Genero</label>
                        <select name="genero" id="genero" required>
                            <option hidden="true" value="">Selecione um Genero</option>
                            <option value="M" <?= $pessoa['GENERO'] == 'M' ? 'selected' : '' ?>>Masculino</option>
                            <option value="F" <?= $pessoa['GENERO'] == 'F' ? 'selected' : '' ?>>Feminino</option>
                        </select>
                    </div>
                </div>
                <div class="item_form">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" value="<?= $pessoa['EMAIL'] ?>" required>
                </div>
            </div>
        </div>
        <div class="item_form">
            <label for="cep">CEP</label>
            <input type="text" name="cep" id="cep" value="<?= $pessoa['CEP'] ?>" required>
        </div>
        <div class="item_form">
            <label for="logradouro">Endereço/Numero</label>
            <input type="text" name="logradouro" id="logradouro" value="<?= $pessoa['LOGRADOURO'] ?>" required>
        </div>
        <div class="item_form">
            <label for="name">Bairro</label>
            <input type="text" name="bairro" id="bairro" value="<?= $pessoa['BAIRRO'] ?>" required>
        </div>
        <div class="item_form">
            <label for="cidade">Estado</label>
            <select name="estado" id="estado" required>
                <option hidden="true" value="">Selecione um Estado</option>
                <?php
                foreach ($estados as $estado) {
                    echo "<option value='{$estado['sigla']}' " . ($pessoa['ESTADO'] == $estado['sigla'] ? 'selected' : '') . ">{$estado['nome']}</option>";
                }
                ?>
            </select>
        </div>
        <div class="item_form">
            <label for="cidade">Cidade</label>
            <select name="cidade" id="cidade">
                <option hidden="true" value="">Selecione uma Cidade</option>
                <?php
                foreach ($cidades['cidades'] as $cidade) {
                    echo "<option value='{$cidade}' " . ($pessoa['CIDADE'] == $cidade ? 'selected' : '') . ">{$cidade}</option>";
                }
                ?>
            </select>
        </div>
        <button class="btn center" type="submit">Editar Perfil</button>
    </form>
</div>