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
          <input type="text" id="nome" value="" placeholder="Digite o nome de quem sera atendido.." required>
        </div>

        <div class="item_form">
          <label for="dataHora">Data e Hora:</label>
          <input type="datetime-local" id="dataHora" required>
        </div>

        <div class="item_form">
          <label for="medico">Médico:</label>
          <select id="medico" required>
            <option value="profissional1">Camila Santiago - Psicologa</option>
            <option value="profissional2">Rodrigo Almeida - Enfermeiro</option>
            <option value="profissional3">Dr. André Oliveira - Médico</option>
            <option value="profissional4">Mariana Silva - Nutricionista</option>
            <option value="profissional5">Beatriz Mendes - Fisioterapeuta</option>
          </select>
        </div>

        <button type="button" class="btn" onclick="agendarConsulta()">Agendar</button>
      </form>
    </div>
  </div>
  <div class="modal_footer"></div>
</div>