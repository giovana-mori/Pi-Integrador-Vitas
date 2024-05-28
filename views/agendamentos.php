<div class="content_">
  <div>
    <button class="btn_agendar" onclick="abrirModal()">Agendar+</button>
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
          <input type="text" id="nome" readonly value="<?= $_SESSION['user_name'] ?>" placeholder="Digite o nome de quem sera atendido.." required>
        </div>

        <div class="item_form">
          <label for="dataHora">Data e Hora:</label>
          <input type="datetime-local" id="dataHora" required>
        </div>

        <div class="item_form">
          <label for="medico">Médico:</label>
          <select id="medico" required>
            <?php
            foreach ($profissionais as $key => $value) {
              echo "<option value='$value->id_profissional'>$value->nome - $value->descritivo</option>";
            };
            ?>
          </select>
        </div>

        <button type="button" class="btn" onclick="agendarConsulta()">Agendar</button>
      </form>
    </div>
  </div>
  <div class="modal_footer"></div>
</div>