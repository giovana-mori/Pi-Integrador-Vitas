<div class="content_ content_perfil">
    <div class="bloco_titulo">
        <h3 class="title_admin">
            <?php echo $title; ?>
        </h3>
    </div>
    <!--table listar pessoas-->
    <div class="bloco_table">
        <div class="filtros">
            <div class="data_filtro">
                <label for="">Nome</label>
                <input type='text' id='data_pessoa_search'>
            </div>
        </div>
        <br>

        <?php
        if (isset($contatos) && count($contatos) > 0) :
        ?>
            <table class="table_admin">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Assunto</th>
                        <th>Descrição</th>
                        <th>Data</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //$pessoas é a variavel que recebeu as pessoas do banco, e $p é a variavel auxiliar do foreach que contem a pessoa
                    foreach ($contatos as $p) {
                        echo '<tr>';
                        echo '<td>' . $p['ID_CONTATO'] . '</td>';
                        echo '<td>' . $p['NOME'] . '</td>';
                        echo '<td>' . $p['ASSUNTO'] . '</td>';
                        echo '<td>' . $p['DESCRICAO'] . '</td>';
                        echo '<td>' . Utils::formatarData($p['DATA']) . '</td>';
                        echo '<td><a href="javascript:openContato(' . $p['ID_CONTATO'] . ')" class="btn btn_editar">Visualizar</a></td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        <?php
        else :
            echo '<p class="text-center">Nenhum Contato cadastrado</p>';
        ?>
        <?php
        endif;
        ?>
    </div>
</div>


<div class="overlay" id="overlay" onclick="fecharModal()"></div>

<div class="modal_agendar">
    <div class="modal_header">
        <h3 class="header_form admin">
            Mensagem
        </h3>
    </div>
    <div class="modal_content">
        <div class="content_form">
            <div class="item_form">
                <input type="hidden" id="id_contato" name="id_contato" value="">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" readonly value="<?= $_SESSION['user_name'] ?>" placeholder="Digite o nome de quem sera atendido.." required>
            </div>

            <div class="item_form">
                <label for="dataHora">Assunto:</label>
                <input type="text" id="data" readonly name="data" required>
            </div>

            <div class="item_form">
                <label for="dataHora">Mensagem:</label>
                <textarea name="descricao" id="descricao" cols="30" rows="10" readonly required></textarea>
            </div>
            <br>
            <button type="button" onclick="fecharModal()" class="btn">Fechar</button>
        </div>
    </div>
    <div class="modal_footer"></div>
</div>

<script>
    function openContato(id) {
        const requestOptions = {
            method: "GET",
            redirect: "follow"
        };

        fetch(`${base_url}/api/vermensagem/${id}`, requestOptions)
            .then((response) => response.text())
            .then((result) => {
                result = JSON.parse(result);
                document.querySelector('#id_contato').value = result.ID_CONTATO;
                document.querySelector('#nome').value = result.NOME;
                document.querySelector('#data').value = result.ASSUNTO;
                document.querySelector('#descricao').value = result.DESCRICAO;
                document.querySelector('.overlay').style.display = 'block';
                document.querySelector('.modal_agendar').style.display = 'block';
            })
            .catch((error) => console.error(error));
    }

    document.querySelector('#data_pessoa_search').addEventListener('keyup', function(e) {
        e.preventDefault();
        let nome = e.target.value;
        const requestOptions = {
            method: "GET",
            redirect: "follow"
        };

        fetch(`${base_url}/api/buscarcontatos${nome && '/' + nome}`, requestOptions)
            .then((response) => response.text())
            .then((result) => {
                result = JSON.parse(result);
                document.querySelector('.table_admin tbody').innerHTML = '';
                result.forEach(element => {
                    document.querySelector('.table_admin tbody').innerHTML += `<tr>
                    <td>${element.ID_CONTATO}</td>
                    <td>${element.NOME}</td>
                    <td>${element.ASSUNTO}</td>
                    <td>${element.DESCRICAO}</td>
                    <td>${element.DATA.split('-').reverse().join('/')}</td>
                    <td><a href="javascript:openContato(${element.ID_CONTATO})" class="btn btn_editar">Visualizar</a></td>
                    </tr>`;
                    console.log(element);
                });
            })
            .catch((error) => console.error(error));
    });
</script>