document.addEventListener("DOMContentLoaded", function () {
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
  const url = `https://servicodados.ibge.gov.br/api/v1/localidades/estados/${estadoSelecionado}/municipios`;

  try {
    const response = await fetch(url);
    const cidades = await response.json();
    const selectCidades = document.getElementById("cidade");

    // Limpa as opções existentes
    selectCidades.innerHTML = "";

    // Adiciona as cidades como opções no select
    cidades.forEach((cidade) => {
      const option = document.createElement("option");
      option.value = cidade.id;
      option.text = cidade.nome;
      selectCidades.appendChild(option);
    });
  } catch (error) {
    console.error("Erro ao carregar cidades:", error);
  }
}

function performLogin() {
  debugger;
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
