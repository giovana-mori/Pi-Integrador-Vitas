document.addEventListener("DOMContentLoaded", function () {
  checkMessage();
  popularEstados();
  document.getElementById("estado")?.addEventListener("change", function (e) {
    e.preventDefault();
    // Chama a função para popular as cidades quando o estado é selecionado
    popularCidades(e.currentTarget.value);
  });
  document.querySelectorAll("[data-target]").forEach((el) => {
    el.addEventListener("click", (e) => {
      e.preventDefault();
      if (!e.currentTarget.dataset.target) {
        return;
      }
      let positionY = document
        .querySelector(`#${e.currentTarget.dataset.target}`)
        .getBoundingClientRect().top;
      window.scrollTo(0, positionY);
    });
  });

  $(".glider").slick({
    infinite: false,
    slidesToShow: 2,
    arrows: false,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1100,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });
});

window.closeMessage = function () {
  setTimeout(function () {
    document.querySelector(".float_message")?.remove();
  }, 500); // Tempo da transição para fechar
};

function checkMessage() {
  var url = new URL(window.location);
  var params = new URLSearchParams(url.search);
  if (params.has("mensagem_sucesso")) {
    // Display the success message
    var message = params.get("mensagem_sucesso");
    var messageContainer = `<div class="float_message" style="opacity:1">
                                <p>${decodeURIComponent(message)}</p>
                                <span class="close" onclick="closeMessage()" style="cursor:pointer">x</span>
                            </div>`;
    document.body.insertAdjacentHTML("afterbegin", messageContainer);
    params.delete("mensagem_sucesso");
    window.history.replaceState({}, document.title, url.pathname);
    setTimeout(function () {
      document.querySelector(".float_message")?.remove();
    }, 5000);
  }
  // Create an XMLHttpRequest to fetch the current page headers
  var xhr = new XMLHttpRequest();
  xhr.open("GET", window.location.href, true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      // Check if the custom header is present
      var successMessage = xhr.getResponseHeader("X-Success-Message");
      if (successMessage) {
        // Display the success message
        var messageContainer = `<div class="float_message">
                                    <p>${successMessage}</p>
                                    <span class="close">x</span>
                                </div>`;
        messageContainer.textContent = successMessage;
        document.body.insertBefore(messageContainer, document.body.firstChild);
      }
    }
  };
  xhr.send();
}

function anchorScrolling(e) {
  console.log(e.currentTarget.dataset.target);
}

async function popularEstados() {
  try {
    const response = await fetch(
      "https://servicodados.ibge.gov.br/api/v1/localidades/estados"
    );
    const estados = await response.json();
    const selectEstados = document.getElementById("estado");

    estados.forEach((estado) => {
      const option = document.createElement("option");
      option.value = estado.sigla;
      option.text = estado.nome;
      selectEstados.appendChild(option);
    });
  } catch (error) {
    console.error("Erro ao carregar estados:", error);
  }
}

async function popularCidades(estadoSelecionado) {
  const url = `http://localhost/vitas/api/cidades/${estadoSelecionado}`;

  try {
    const response = await fetch(url);
    const data = await response.json();
    const cidades = data.cidades;
    const selectCidades = document.getElementById("cidade");

    // Limpa as opções existentes
    selectCidades.innerHTML = "";

    // Adiciona as cidades como opções no select
    cidades.forEach((cidade) => {
      const option = document.createElement("option");
      option.value = cidade;
      option.text = cidade;
      selectCidades.appendChild(option);
    });
  } catch (error) {
    console.error("Erro ao carregar cidades:", error);
  }
}

function performLogin() {
  var username = document.getElementById("email").value;
  var password = document.getElementById("senha").value;

  if (username == "" || password == "") {
    alert("Usuario ou senha nao pode ser vazio!");
    return false;
  }

  var usuarios = JSON.parse(localStorage.getItem("usuarios")) || [];
  var usuarioExists = usuarios.filter(
    (us) => us.email == username && us.senha == password
  );

  if (usuarioExists.length > 0) {
    window.location.href = "./agendamentos";
  } else {
    alert("Usuario ou senha invalido!");
  }
}

function registerUsersFromLocalStorage() {
  // Obter os valores do formulário
  var nome = document.getElementById("name").value;
  var endereco = document.getElementById("endereco").value;
  var bairro = document.getElementById("bairro").value;
  var estado = document.getElementById("estado").value;
  var cidade = document.getElementById("cidade").value;
  var email = document.getElementById("email").value;
  var senha = document.getElementById("senha").value;

  if (
    nome == "" ||
    endereco == "" ||
    bairro == "" ||
    estado == "" ||
    cidade == "" ||
    email == "" ||
    senha == ""
  ) {
    alert("Por favor, preencha todos os campos.");
    return;
  }

  // Criar um objeto com os dados do usuario
  var usuario = {
    nome: nome,
    endereco: endereco,
    bairro: bairro,
    estado: estado,
    cidade: cidade,
    email: email,
    senha: senha,
  };

  // Verificar se já existe um array de usuarios no localStorage
  var usuarios = JSON.parse(localStorage.getItem("usuarios")) || [];

  // Adicionar a nova consulta ao array
  usuarios.push(usuario);

  // Salvar o array atualizado de usuarios no localStorage
  localStorage.setItem("usuarios", JSON.stringify(usuarios));

  alert("Cadastro efetuado com sucesso!");

  window.location.href = "./login";
}

function getUsersFromLocalStorage() {
  return JSON.parse(localStorage.getItem("registros")) || [];
}
