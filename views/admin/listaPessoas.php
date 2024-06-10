<div class="content_ content_perfil">
    <div class="bloco_titulo">
        <h3 class="title_admin">
            <?php echo $title; ?>
        </h3>
    </div>
    <!--table listar pessoas-->
    <div class="bloco_table">
        <div>
            <a href="<?php echo Utils::base_url('novocadastro'); ?>" class="btn">Novo Cadastro +</a>
        </div>
        <br>

        <table class="table_admin">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Nascimento</th>
                    <th>CPF</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //$pessoas é a variavel que recebeu as pessoas do banco, e $p é a variavel auxiliar do foreach que contem a pessoa
                foreach ($pessoas as $p) {
                    echo '<tr>';
                    echo '<td>' . $p['ID_PESSOA'] . '</td>';
                    echo '<td>' . $p['NOME'] . '</td>';
                    echo '<td>' . $p['EMAIL'] . '</td>';
                    echo '<td>' . Utils::formatarData($p['DATANASC']) . '</td>';
                    echo '<td>' . $p['CPF'] . '</td>';
                    echo '<td><a href="' . Utils::base_url('editarcadastro/' . $p['ID_PESSOA']) . '" class="btn btn_editar">Editar</a></td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>