<div class="content_">
    <div class="bloco_titulo">
        <h3 class="title_admin">
            <?php echo $title; ?>
        </h3>
    </div>
    <div class="filtros">
        <div class="data_filtro">
            <label for="">Data</label>
            <input type='date' onchange='filterAtendimentos(this.value)' id='data_filtro'>
        </div>
    </div>
    <div class="box_meus_agendamentos">
        <?php if (count($agendamentos) > 0) : ?>
            <?php foreach ($agendamentos as $key => $value) :
                $id = $value['ID_AGENDA'];
                $nomePessoa = $value['NOME_PESSOA'];
                $hora = $value['HORA'];
                $duracao = $value['DURACAO'];
                $profissional = $value['NOME_PROFISSIONAL'];
                $obs = !isset($value['OBSERVACOES']) || $value['OBSERVACOES'] == '' ? 'Nenhuma' :  $value['OBSERVACOES'];
                //format data to br format
                $data = date('d/m/Y', strtotime($value['DATA']));
                $id = $value['ID_AGENDA'];
                $uploads = $value["UPLOADS"];
            ?>
                <div class="item_agendamento">
                    <div class="item_agendamento_header">
                        <div class="item_agendamento_header_title">
                            <?php echo $data; ?>
                            <a href="javascript:deleteAgendamnto(<?= $id ?>)">deletar</a>
                        </div>
                    </div>
                    <div class="item_agendamento_body">
                        <ul>
                            <li>
                                <b>Nome</b> : <?php echo $nomePessoa; ?>
                            </li>
                            <li>
                                <b>Inicio</b> : <?php echo $hora; ?>
                            </li>
                            <li>
                                <b>Duração</b> : <?php echo $duracao; ?>
                            </li>
                            <li>
                                <b>Profissional</b> : <?php echo $profissional; ?>
                            </li>
                            <li class="item_obs">
                                <b>Obs</b> : <?= $obs ?>
                            </li>
                        </ul>
                        <input type="button" value="ver mais" onclick="openAgendamentoInfos(<?php echo $id; ?>)" class="button_ver_mais">
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>Nenhum agendamento encontrado.</p>
        <?php endif; ?>
    </div>
</div>

<div class="overlay" id="overlay" onclick="fecharModal()"></div>

<div class="modal_agendar">
    <div class="modal_header">
        <h3 class="header_form admin">
            Informacoes Agendamento
        </h3>
    </div>
    <div class="modal_content">
        <div class="content_form">
            <div class="ler_infos">

            </div>
        </div>
    </div>
    <div class="modal_footer"></div>
</div>

<script>
    function deleteAgendamnto(id) {
        if (confirm("Deseja realmente deletar esse agendamento?")) {
            debugger;
            const requestOptions = {
                method: "GET",
                redirect: "follow"
            };

            fetch(`${base_url}/api/deletaragendamento${id && '/' + id}`, requestOptions)
                .then((response) => response.json())
                .then((result) => {
                    if (result.success) {
                        alert('Agendamento deletado com sucesso!')
                        window.location.reload();
                    }

                })
                .catch((error) => console.error(error));
        }
    }
</script>