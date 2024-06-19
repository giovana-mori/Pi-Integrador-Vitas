<div class="content_ content_perfil">
    <div class="bloco_titulo">
        <h3 class="title_admin">
            <?= $title ?>
        </h3>
    </div>
    <form method="post" >
        <div class="item_form">
            <label for="nome">Nome:</label>
            <input type="hidden" name="id_agenda" id="id_agenda" readonly required value="<?= $agendamento['ID_AGENDA'] ?? '' ?>">
            <input type="hidden" name="id_pessoa" id="id_pessoa" readonly required value="<?= $agendamento['PESSOA_ID'] ?? '' ?>">
            <input type="text" name="nome" readonly id="nome" value="<?= $agendamento['NOME_PESSOA'] ?? '' ?>" placeholder="Digite o nome de quem sera atendido.." required>
        </div>

        <div class="item_form">
            <label for="dataHora">Data:</label>
            <input type="date" id="data" value="<?= $agendamento['DATA'] ?? '' ?>" name="data" required>
        </div>

        <div class="item_form">
            <label for="dataHora">Hora:</label>
            <input type="time" id="hora" value="<?= $agendamento['HORA'] ?? '' ?>" name="hora" required>
        </div>

        <div class="item_form">
            <label for="dataHora">Duração: (minutos)</label>
            <input type="number" id="duracao" value="<?= $agendamento['DURACAO'] ?? '' ?>" readonly name="duracao" required>
        </div>

        <div class="item_form">
            <label for="profissional">Profissional:</label>
            <select name="id_profissional" id="id_profissional" required>>
                <option value="">Selecione um profissional</option>
                <?php foreach ($profissionais as $profissional) : ?>
                    <option value="<?= $profissional['id_profissional'] ?>" <?= ($agendamento['PROFISSIONAL_ID'] == $profissional['id_profissional']) ? 'selected' : '' ?>><?= $profissional['nome'] . ' - ' . $profissional['tipo_profissional'] . ' - ' . $profissional['descritivo'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="item_form">
            <label for="observacao">Observação (Opcional):</label>
            <textarea id="observacao" name="observacao" placeholder="Observações da consulta.."></textarea>
        </div>
        <button class="btn center" type="submit">Editar Agendamento</button>
    </form>
</div>