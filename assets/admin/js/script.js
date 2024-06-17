document.addEventListener("DOMContentLoaded", function () {
  document
    .querySelector("#contato_form")
    ?.addEventListener("submit", function (e) {
      e.preventDefault();
      validarFormulario(e);
    });

  document.getElementById("estado")?.addEventListener("change", function (e) {
    e.preventDefault();
    // Chama a função para popular as cidades quando o estado é selecionado
    popularCidades(e.currentTarget.value);
  });

  document
    .getElementById("profileImage")
    ?.addEventListener("change", function (event) {
      debugger;
      //send image with uploadAvatar and after call reader.onload
      uploadAvatar(this, document.querySelector("#id_pessoa").value)
        .then((response) => response.json())
        .then((result) => {
          console.log(result);
          //if result has success, return message
          alert(result.success);
        })
        .catch((error) => console.log("error", error));
      //show image preview
      var output = document.querySelector(".imagePreview");
      output.style.display = "block";
      //read image with FileReader
      var reader = new FileReader();
      reader.onload = function () {
        var output = document.querySelector(".imagePreview");
        output.src = reader.result;
        output.style.display = "block";
      };
      reader.readAsDataURL(event.target.files[0]);
    });

  document
    .getElementById("profileLogo")
    ?.addEventListener("change", function (event) {
      debugger;
      //send image with uploadAvatar and after call reader.onload
      uploadLogo(this, document.querySelector("#id_clinica").value);
      //show image preview
      var output = document.querySelector(".imagePreview");
      output.style.display = "block";
      //read image with FileReader
      var reader = new FileReader();
      reader.onload = function () {
        var output = document.querySelector(".imagePreview");
        output.src = reader.result;
        output.style.display = "block";
      };
      reader.readAsDataURL(event.target.files[0]);
    });

  document.querySelectorAll("[data-profissional]").forEach(function (element) {
    element.addEventListener("click", function (e) {
      e.preventDefault();
      const id_profissional = this.dataset.profissional;
      profissionalPicker(id_profissional);
    });
  });

  document
    .querySelector("#consultaForm")
    ?.addEventListener("submit", function (e) {
      e.preventDefault();
      debugger;
      //criar fetch post para a url `${base_url}/api/agendar/`, enviar os dados de agendament
      const form = e.target;
      const formData = new FormData(form);
      const url = `${base_url}/api/agendar`;
      const requestOptions = {
        method: "POST",
        body: formData,
        redirect: "follow",
      };

      //fetch get retorn in json
      fetch(url, requestOptions)
        .then((response) => response.json())
        .then((result) => {
          console.log(result);
          //if result has success, return message
          if (result.success) {
            debugger;
            let fileInput = document.querySelector(
              "#consultaForm [name='upload']"
            );
            if (fileInput.files.length > 0) {
              uploadFile(fileInput, result.id_agenda);
            }
            //limpar apenas o input file
            alert("Consulta agendada com sucesso!");
          } else {
            alert("Erro ao agendar consulta!");
          }

          fecharModal();
        })
        .catch((error) => console.log("error", error));
      return false;
    });
});

async function popularCidades(estadoSelecionado) {
  debugger;
  const url = `${base_url}/api/cidades/${estadoSelecionado}`;

  try {
    const response = await fetch(url);
    const data = await response.json();
    const selectCidades = document.getElementById("cidade");

    // Limpa as opções existentes
    selectCidades.innerHTML = "";

    // Adiciona as cidades como opções no select
    data.cidades.forEach((cidade) => {
      const option = document.createElement("option");
      option.value = cidade;
      option.text = cidade;
      selectCidades.appendChild(option);
    });
  } catch (error) {
    console.error("Erro ao carregar cidades:", error);
  }
}

async function uploadAvatar(inputFile, id_pessoa) {
  if (!inputFile.files[0]) {
    alert("Por favor, selecione uma imagem para fazer o upload.");
    return;
  }

  if (!id_pessoa) {
    alert("Por favor, selecione uma pessoa para fazer o upload.");
    return;
  }

  const formdata = new FormData();
  formdata.append("profileImage", inputFile.files[0]);
  formdata.append("id_pessoa", id_pessoa);

  const requestOptions = {
    method: "POST",
    body: formdata,
    redirect: "follow",
  };

  fetch(`${base_url}/api/upload`, requestOptions)
    .then((response) => response.text())
    .then((result) => console.log(result))
    .catch((error) => console.error(error));
}

function uploadLogo(inputFile, id_clinica) {
  if (!inputFile.files[0]) {
    alert("Por favor, selecione uma imagem para fazer o upload.");
    return;
  }

  if (!id_clinica) {
    alert("Por favor, selecione uma pessoa para fazer o upload.");
    return;
  }

  const formdata = new FormData();
  formdata.append("profileLogo", inputFile.files[0]);
  formdata.append("id_clinica", id_clinica);

  const requestOptions = {
    method: "POST",
    body: formdata,
    redirect: "follow",
  };

  fetch(`${base_url}/api/uploadlogo`, requestOptions)
    .then((response) => response.text())
    .then((result) => console.log(result))
    .catch((error) => console.error(error));
}

function uploadFile(inputFile, id_agenda) {
  if (!inputFile.files[0]) {
    alert("Por favor, selecione um arquivo para fazer o upload.");
    return;
  }

  const formdata = new FormData();
  formdata.append("upload", inputFile.files[0]);
  formdata.append("id_agenda", id_agenda);

  const requestOptions = {
    method: "POST",
    body: formdata,
    redirect: "follow",
  };

  fetch(`${base_url}/api/uploadDoc`, requestOptions)
    .then((response) => response.text())
    .then((result) => console.log(result))
    .catch((error) => console.error(error));
}

// Função para abrir o modal
function abrirModal() {
  document.querySelector(".modal_agendar").style.display = "block";
  document.querySelector(".overlay").style.display = "block";
}

// Função para fechar o modal
function fecharModal() {
  document.querySelector(".modal_agendar").style.display = "none";
  document.querySelector(".overlay").style.display = "none";
}

// Função para obter uma data aleatória dentro de um intervalo
function getRandomDate(start, end) {
  return new Date(
    start.getTime() + Math.random() * (end.getTime() - start.getTime())
  );
}

function getCalHeight() {
  // Defina a lógica conforme necessário. Pode depender do tamanho da janela ou de outros fatores.
  return $(window).height() - 50; // Exemplo: altura da janela menos 50 pixels
}

function validarFormulario(e) {
  // Obter valores dos campos
  var name = document.getElementById("name").value.trim();
  var subject = document.getElementById("assunto").value.trim();
  var description = document.getElementById("description").value.trim();

  // Validar campos
  if (name === "" || subject === "" || description === "") {
    alert("campos vazios, preencha todos");
    return;
  }

  // Se a validação passar, você pode enviar o formulário ou realizar outras ações aqui
  alert("Formulário enviado com sucesso!");

  e.currentTarget.reset();
}

$(document).ready(function () {
  // Fechar o modal ao pressionar a tecla "Esc"
  document.addEventListener("keydown", function (event) {
    if (event.key === "Escape") {
      fecharModal();
    }
  });
});

function initializeCalendar() {
  document.querySelector(".content_calendar").innerHTML =
    '<div id="calendar"></div>';
  var calendar = $("#calendar").fullCalendar({
    header: {
      left: "prev,next today",
      center: "title",
      right: "month,basicWeek,basicDay",
    },
    initialView: "timeGridWeek", // Visualização semanal com intervalo de horas
    slotDuration: "00:30:00", // Intervalos de 30 minutos
    slotLabelInterval: "01:00", // Rótulos de hora a cada 1 hora
    aspectRatio: 1.35, // Ajuste este valor conforme necessário
    windowResize: function (view) {
      // Ajustar o FullCalendar quando a janela é redimensionada
      // Você pode adicionar lógica personalizada aqui, se necessário
      $("#calendar").fullCalendar("option", "height", getCalHeight());
    },
    locale: "pt-br",
    events: [], // Adicione os eventos da localStorage
    eventClick: function (calEvent, jsEvent, view) {
      debugger;
      document.querySelector("#data").value = moment(calEvent.start).format(
        "YYYY-MM-DD"
      );
      document.querySelector("#hora").value = moment(calEvent.start).format(
        "HH:mm"
      );
      document.querySelector("#duracao").value = calEvent.end.diff(
        calEvent.start,
        "minutes"
      );
      document.querySelector("#id_profissional").value =
        calEvent.profissional_id;
      document.querySelector(".profissional_name").value =
        calEvent.profissional_nome;
      abrirModal();
    },
  });
}

function openAgendamentoInfos(id_agendamento = undefined) {
  if (!id_agendamento || id_agendamento == undefined) {
    return;
  }

  fetch(`${base_url}/api/agendamento/${id_agendamento}`)
    .then((response) => response.json())
    .then((data) => {
      let html = `<ul>
                      <li>
                          <b>Inicio:</b> ${data.HORA}
                      </li>
                      <li>
                          <b>Data:</b> ${data.DATA.split("-")
                            .reverse()
                            .join("/")}
                      </li>
                      <li>
                          <b>Obs:</b> ${
                            data.OBSERVACOES ? data.OBSERVACOES : "Nenhuma"
                          }
                      </li>
                      <li class='content_download'>
                          <b>Anexo: </b> ${
                            data.UPLOADS.length > 0
                              ? '<a href="' +
                                base_url +
                                "/uploads/documentos/" +
                                data.UPLOADS[0].URL +
                                '" target="_blank" class="download_btn">Baixar Arquivo</a>'
                              : "Nenhum Arquivo"
                          }
                      </li>
                  </ul>`;
      document.querySelector(".ler_infos").innerHTML = html;
      // Exibe o modal
      abrirModal();
    })
    .catch((error) => console.error(error));
}

function profissionalPicker(idProfissional) {
  const diaSemanaParaData = {
    domingo: 0,
    segunda: 1,
    terca: 2,
    quarta: 3,
    quinta: 4,
    sexta: 5,
    sabado: 6,
  };
  if (!idProfissional) {
    alert("Por favor, selecione um profissional.");
    return;
  }
  fetch(`${base_url}/api/horarios/${idProfissional}`) // URL do seu endpoint REST
    .then((response) => {
      if (!response.ok) {
        throw new Error("Erro ao carregar eventos: " + response.statusText);
      }
      return response.json();
    })
    .then((data) => {
      const events = [];
      const tomorrow = moment().add(1, "days").startOf("day"); // Amanhã, no início do dia
      const endOfYear = moment().endOf("year").startOf("day"); // Fim do ano, no início do dia

      // Itera sobre cada evento retornado pela API
      data.forEach((event) => {
        event.DIAS_SEMANA_DISPONIVEIS.forEach((disponivel) => {
          const dataDisponivel = moment(disponivel.data).startOf("day"); // Data disponível, no início do dia

          // Verifica se a data disponível está dentro do ano atual, a partir de amanhã
          if (
            dataDisponivel.isSameOrAfter(tomorrow) &&
            dataDisponivel.isSameOrBefore(endOfYear)
          ) {
            // Verifica se é o dia da semana correto
            if (
              event.DIA_SEMANA.toLowerCase() ===
              disponivel.diaSemana.toLowerCase()
            ) {
              event.DISPONIVEIS.forEach((horario) => {
                const startDateTime = moment(disponivel.data + "T" + horario);
                const endDateTime = moment(startDateTime).add(
                  event.DURACAO,
                  "minutes"
                );

                events.push({
                  title: `${startDateTime.format(
                    "HH:mm"
                  )} - ${endDateTime.format("HH:mm")}`,
                  start: startDateTime.format("YYYY-MM-DDTHH:mm:ss"),
                  end: endDateTime.format("YYYY-MM-DDTHH:mm:ss"),
                  allDay: false,
                  eventId: event.ID_HORARIO, // Adiciona o ID do evento como propriedade
                  profissional_id: event.ID_PROFISSIONAL, // Adiciona o ID do profissional como propriedade
                  profissional_nome: event.NOME, // Adiciona o nome do profissional como propriedade
                });
              });
            }
          }
        });
      });

      initializeCalendar();

      $("#calendar").fullCalendar("removeEvents");
      // Adicionando eventos ao calendário
      $("#calendar").fullCalendar("addEventSource", events);

      //scrolling to #calendar
      $("html, body").animate(
        {
          scrollTop: $("#calendar").offset().top,
        },
        300
      );
    })
    .catch((error) => {
      console.error("Erro ao carregar eventos:", error);
    });
}

function filterAtendimentos(date) {
  const formattedDate = moment(date).format("YYYY-MM-DD");
  fetch(`${base_url}/api/buscaratendimento/${formattedDate}`)
    .then((response) => response.json())
    .then((data) => {
      let html = "";
      if (data.length > 0) {
        data.forEach((item) => {
          html += `<div class="item_agendamento">
                        <div class="item_agendamento_header">
                            <div class="item_agendamento_header_title">
                                ${item.DATA.split("-").reverse().join("/")}
                                <a href="${
                                  base_url +
                                  "/editaragendamento/" +
                                  item.ID_AGENDA
                                }">editar</a>
                            </div>
                        </div>
                        <div class="item_agendamento_body">
                            <ul>
                                <li>
                                    <b>Nome</b> :  :  ${item.NOME_PESSOA}
                                </li>
                                <li>
                                    <b>Inicio</b> :  ${item.HORA}
                                </li>
                                <li>
                                    <b>Duração</b> : ${item.DURACAO}
                                </li>
                                <li>
                                    <b>Profissional</b> : ${
                                      item.NOME_PROFISSIONAL
                                    }
                                </li>
                                <li class="item_obs">
                                    <b>Obs</b> : ${
                                      item.OBSERVACOES
                                        ? item.OBSERVACOES
                                        : "Nenhuma"
                                    }
                                </li>
                            </ul>
                            <input type="button" value="ver mais" onclick="openAgendamentoInfos(${
                              item.ID_AGENDA
                            })" class="button_ver_mais">
                        </div>
                    </div>`;
        });
        //
      } else {
        html = "<p>Nenhum agendamento encontrado.</p>";
      }
      document.querySelector(".box_meus_agendamentos").innerHTML = html;
    })
    .catch((error) => console.error(error));
}

function filterMeusAtendimentos(id, date) {
  const formattedDate = moment(date).format("YYYY-MM-DD");
  fetch(`${base_url}/api/meusatendimentos/${id}/${formattedDate}`)
    .then((response) => response.json())
    .then((data) => {
      let html = "";
      if (data.length > 0) {
        data.forEach((item) => {
          html += `<div class="item_agendamento">
                        <div class="item_agendamento_header">
                            <div class="item_agendamento_header_title">
                                ${item.DATA}
                            </div>
                        </div>
                        <div class="item_agendamento_body">
                            <ul>
                              <li>
                                  <b>Nome</b> :  :  ${item.NOME_PESSOA}
                              </li>
                                <li>
                                    <b>Inicio</b> :  ${item.HORA}
                                </li>
                                <li>
                                    <b>Duração</b> : ${item.DURACAO}
                                </li>
                                <li>
                                    <b>Profissional</b> : ${
                                      item.NOME_PROFISSIONAL
                                    }
                                </li>
                                <li class="item_obs">
                                    <b>Obs</b> : ${
                                      item.OBSERVACOES
                                        ? item.OBSERVACOES
                                        : "Nenhuma"
                                    }
                                </li>
                            </ul>
                            <input type="button" value="ver mais" onclick="openAgendamentoInfos(${
                              item.ID_AGENDA
                            })" class="button_ver_mais">
                        </div>
                    </div>`;
        });
        //
      } else {
        html = "<p>Nenhum agendamento encontrado.</p>";
      }
      document.querySelector(".box_meus_agendamentos").innerHTML = html;
    })
    .catch((error) => console.error(error));
}

function filterMeusAgendamentos(id, date) {
  const formattedDate = moment(date).format("YYYY-MM-DD");
  fetch(`${base_url}/api/meusagendamentos/${id}/${formattedDate}`)
    .then((response) => response.json())
    .then((data) => {
      let html = "";
      if (data.length > 0) {
        data.forEach((item) => {
          html += `<div class="item_agendamento">
                        <div class="item_agendamento_header">
                            <div class="item_agendamento_header_title">
                                ${item.DATA}
                            </div>
                        </div>
                        <div class="item_agendamento_body">
                            <ul>
                                <li>
                                    <b>Nome</b> :  :  ${item.NOME_PESSOA}
                                </li>
                                <li>
                                    <b>Inicio</b> :  ${item.HORA}
                                </li>
                                <li>
                                    <b>Duração</b> : ${item.DURACAO}
                                </li>
                                <li>
                                    <b>Profissional</b> : ${
                                      item.NOME_PROFISSIONAL
                                    }
                                </li>
                                <li class="item_obs">
                                    <b>Obs</b> : ${
                                      item.OBSERVACOES
                                        ? item.OBSERVACOES
                                        : "Nenhuma"
                                    }
                                </li>
                            </ul>
                            <input type="button" value="ver mais" onclick="openAgendamentoInfos(${
                              item.ID_AGENDA
                            })" class="button_ver_mais">
                        </div>
                    </div>`;
        });
        //
      } else {
        html = "<p>Nenhum agendamento encontrado.</p>";
      }
      document.querySelector(".box_meus_agendamentos").innerHTML = html;
    })
    .catch((error) => console.error(error));
}
