<div class="content_">
  <!--<div>
    <button class="btn_agendar" onclick="abrirModal()">Agendar+</button>
  </div>-->
  <div class="box_profissionais">
    <span>SELECIONA UM PROFISSIONAL:</span>
    <div class="profissionais">
      <div class="optimization-content-style">
        <?php
        foreach ($profissionais as $key => $value) :
        ?>
          <div class="optimization-content-desc" data-profissional="<?= $value['id_profissional'] ?>">
            <div class="simbolo">
              <img src="https://static.vecteezy.com/system/resources/previews/013/042/571/original/default-avatar-profile-icon-social-media-user-photo-in-flat-style-vector.jpg">
            </div>
            <h2><?= $value['nome'] ?></h2>
            <small><?= $value['tipo_profissional'] ?> - <?= $value['descritivo'] ?></small>
          </div>
        <?php
        endforeach;
        ?>
      </div>
    </div>
  </div>
  <div id="calendar"></div>
</div>

<div class="overlay" id="overlay" onclick="fecharModal()"></div>

<div class="modal_agendar">
  <div class="modal_header">
    <h3 class="header_form admin">
      Agendar uma Consultar
    </h3>
  </div>
  <div class="modal_content">
    <div class="content_form">
      <form id="consultaForm">
        <div class="item_form">
          <label for="nome">Nome:</label>
          <input type="hidden" id="id_pessoa" name="id_pessoa" value="<?= $_SESSION['user_id'] ?>">
          <input type="text" id="nome" readonly value="<?= $_SESSION['user_name'] ?>" placeholder="Digite o nome de quem sera atendido.." required>
        </div>

        <div class="item_form">
          <label for="dataHora">Data e Hora:</label>
          <input type="date" id="data" readonly name="data" required>
        </div>

        <div class="item_form">
          <label for="dataHora">Data e Hora:</label>
          <input type="time" id="hora" readonly name="hora" required>
        </div>

        <div class="item_form">
          <label for="dataHora">Duração: (minutos)</label>
          <input type="number" id="duracao" readonly name="duracao" required>
        </div>

        <div class="item_form">
          <label for="medico">Profissional:</label>
          <input type="hidden" id="id_profissional" name="id_profissional" value="">
          <input type="text" class="profissional_name" readonly value="" required >
        </div>

        <div class="item_form">
          <label for="observacao">Observação (Opcional):</label>
          <textarea id="observacao" name="observacao" l placeholder="Observações da consulta.."></textarea>
        </div>

        <div class="item_form">
          <label for="upload">Anexos:</label>
          <input type="file" id="upload" name="upload" accept=".pdf,.doc,.docx,.txt,.jpg,.jpeg,.png">
        </div>

        <button type="submit" class="btn">Agendar</button>
      </form>
    </div>
  </div>
  <div class="modal_footer"></div>
</div>