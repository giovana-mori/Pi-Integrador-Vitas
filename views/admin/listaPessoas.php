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
        <div class="filtros">
            <div class="data_filtro">
                <label for="">Nome</label>
                <input type='text' id='data_pessoa_search'>
            </div>
        </div>
        <br>

        <?php
        if (isset($pessoas) && count($pessoas) > 0) :
        ?>
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
        <?php
        else :
            echo '<p class="text-center">Nenhuma Pessoa cadastrada</p>';
        endif;
        ?>
    </div>
</div>

<script>
    document.querySelector('#data_pessoa_search').addEventListener('keyup', function(e) {
        e.preventDefault();
        let nome = e.target.value;
        const requestOptions = {
            method: "GET",
            redirect: "follow"
        };

        fetch(`${base_url}/api/pessoas${nome && '/' + nome}`, requestOptions)
            .then((response) => response.text())
            .then((result) => {
                result = JSON.parse(result);
                document.querySelector('.table_admin tbody').innerHTML = '';
                result.forEach(element => {
                    document.querySelector('.table_admin tbody').innerHTML += `<tr>
                    <td>${element.ID_PESSOA}</td>
                    <td>${element.NOME}</td>
                    <td>${element.EMAIL}</td>
                    <td>${element.DATANASC.split('-').reverse().join('/')}</td>
                    <td>${element.CPF}</td>
                    <td><a href="${base_url + '/editarcadastro/' + element.ID_PESSOA}" class="btn btn_editar">Editar</a></td>
                    </tr>`;
                    console.log(element);
                });
            })
            .catch((error) => console.error(error));
    });
</script>