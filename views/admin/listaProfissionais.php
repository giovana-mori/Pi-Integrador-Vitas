<div class="content_ content_perfil">
    <div class="bloco_titulo">
        <h3 class="title_admin">
            <?php echo $title; ?>
        </h3>
    </div>
    <!--table listar pessoas-->
    <div class="bloco_table">
        <div>
            <a href="<?php echo Utils::base_url('novoprofissional'); ?>" class="btn">Novo Cadastro +</a>
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
        if (isset($profissionais) && count($profissionais) > 0) :
        ?>
            <div class="wrapper_table">
                <table class="table_admin">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Registro (nº)</th>
                            <th>Descritivo</th>
                            <th>Tipo</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //$pessoas é a variavel que recebeu as pessoas do banco, e $p é a variavel auxiliar do foreach que contem a pessoa
                        foreach ($profissionais as $p) {
                            echo '<tr>';
                            echo '<td>' . $p['id_profissional'] . '</td>';
                            echo '<td>' . $p['nome'] . '</td>';
                            echo '<td>' . $p['registroclasseprofissional'] . '</td>';
                            echo '<td>' . $p['descritivo'] . '</td>';
                            echo '<td>' . $p['tipo'] . '</td>';
                            echo '<td><a href="' . Utils::base_url('editarprofissional/' . $p['id_profissional']) . '" class="btn btn_editar">Editar</a></td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        <?php
        else :
            echo '<p class="text-center">Nenhum profissional cadastrado</p>';
        ?>
        <?php
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

        fetch(`${base_url}/api/profissionais${nome && '/' + nome}`, requestOptions)
            .then((response) => response.text())
            .then((result) => {
                result = JSON.parse(result);
                document.querySelector('.table_admin tbody').innerHTML = '';
                result.forEach(element => {
                    document.querySelector('.table_admin tbody').innerHTML += `<tr>
                    <td>${element.id_profissional}</td>
                    <td>${element.nome}</td>
                    <td>${element.registroclasseprofissional}</td>
                    <td>${element.descritivo}</td>
                    <td>${element.tipo}</td>
                    <td><a href="${base_url + '/editarprofissional/' + element.id_profissional}" class="btn btn_editar">Editar</a></td>
                    </tr>`;
                    console.log(element);
                });
            })
            .catch((error) => console.error(error));
    });
</script>