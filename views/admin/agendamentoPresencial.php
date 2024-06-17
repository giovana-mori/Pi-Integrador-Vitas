<div class="content_">
  <div class="bloco_titulo">
    <h3 class="title_admin">
      <?= $title ?>
    </h3>
  </div>

  <?php if (count($profissionais) > 0) : ?>
    <div class="box_profissionais">
      <span>SELECIONE UM PROFISSIONAL:</span>
      <div class="profissionais">
        <div class="optimization-content-style">
          <?php
          foreach ($profissionais as $key => $value) :
          ?>
            <div class="optimization-content-desc" data-profissional="<?= $value['id_profissional'] ?>" class="">
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
    <div class="content_calendar">
    </div>

  <?php else : ?>
    <p class="text-center">Nenhum Profissional encontrado para agendar</p>
  <?php endif; ?>
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
          <input type="hidden" name="id_pessoa" id="id_pessoa" readonly required value="<?= $profissional['PESSOA_ID'] ?? '' ?>">
          <div class="item_form">
            <div class="relative">
              <input type="text" name="nome" autocomplete="off" id="nome" placeholder="Digite o nome de quem sera atendido.." required onkeypress="return false;" value="">
              <div class="result">
                <input type="text" name="search_people" id="search_people" value="">
                <ul class="listPessoas"></ul>
              </div>
            </div>
          </div>
        </div>

        <div class="item_form">
          <label for="dataHora">Data:</label>
          <input type="date" id="data" readonly name="data" required>
        </div>

        <div class="item_form">
          <label for="dataHora">Hora:</label>
          <input type="time" id="hora" readonly name="hora" required>
        </div>

        <div class="item_form">
          <label for="dataHora">Duração: (minutos)</label>
          <input type="number" id="duracao" readonly name="duracao" required>
        </div>

        <div class="item_form">
          <label for="medico">Profissional:</label>
          <input type="hidden" id="id_profissional" name="id_profissional" value="">
          <input type="text" class="profissional_name" readonly value="" required>
        </div>

        <div class="item_form">
          <label for="observacao">Observação (Opcional):</label>
          <textarea id="observacao" name="observacao" placeholder="Observações da consulta.."></textarea>
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

<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('#nome')?.addEventListener('click', (e) => {
      e.preventDefault;
      //inicializar o ponteiro de digitacao no #search_people
      document.querySelector('#search_people').value = '';
      //mostrar o .result
      document.querySelector('.result').style.display = 'block';
      //inicializar o ponteiro de digitacao no #search_people
      document.querySelector('#search_people').focus();
    });

    //se clicar fora do #nome, #search_people ou .result, fechar o .result   
    document.addEventListener('click', (e) => {
      //ou se apertar esc tambem sai
      if (e.target.id !== 'nome' && e.target.id !== 'search_people' && e.target.className !== 'result') {
        document.querySelector('.result').style.display = 'none';
      }
    });

    document.querySelector('#search_people').addEventListener('keyup', eventSearchPessoa)
    document.querySelector('#search_people').addEventListener('focus', eventSearchPessoa)
  });

  const eventSearchPessoa = (e) => {
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
        console.log(result);
        document.querySelector('.listPessoas').innerHTML = result.length > 0 ? '' : 'Nenhum resultado encontrado';
        result.forEach(element => {
          document.querySelector('.listPessoas').innerHTML += `<li data-id='${element.ID_PESSOA}' onclick='selectPessoa(event)'>${element.NOME}</li>`;
        })
      })
      .catch((error) => console.error(error));
  }

  const selectPessoa = (e) => {
    e.preventDefault();
    const id = e.target.getAttribute('data-id');
    const nome = e.target.innerText;
    document.querySelector('#id_pessoa').value = id;
    document.querySelector('#nome').value = nome;
    document.querySelector('#search_people').value = nome;
    document.querySelector('.listPessoas').innerHTML = '';
    document.querySelector('.result').style.display = 'none';
  };
</script>