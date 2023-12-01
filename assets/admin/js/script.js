function agendarConsulta() {
    // Obter os valores do formulário
    var nome = document.getElementById("nome").value;
    var dataHora = document.getElementById("dataHora").value;
    var medico = document.getElementById("medico").value;

    if (nome == "" || dataHora == "" || medico == "") {
        alert("Por favor, preencha todos os campos.");
        return;
    }

    // Criar um objeto com os dados da consulta
    var consulta = {
        nome: nome,
        dataHora: dataHora,
        medico: medico
    };

    // Verificar se já existe um array de consultas no localStorage
    var consultas = JSON.parse(localStorage.getItem("consultas")) || [];

    // Adicionar a nova consulta ao array
    consultas.push(consulta);

    // Salvar o array atualizado de consultas no localStorage
    localStorage.setItem("consultas", JSON.stringify(consultas));

    // Remover todos os eventos do calendário
    $('#calendar').fullCalendar('removeEvents');

    // Adicionar os novos eventos
    $('#calendar').fullCalendar('addEventSource', generateEventsFromLocalStorage());

    // Limpar o formulário
    document.getElementById("consultaForm").reset();

    alert("Consulta agendada com sucesso!");

    fecharModal();
}

function performLogin() {
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    // Simulando credenciais válidas
    var validUsername = 'user';
    var validPassword = 'pass';

    if (username === validUsername && password === validPassword) {
        alert('Login successful!');
    } else {
        alert('Invalid username or password. Please try again.');
    }
}
async function popularEstados() {
    try {
        const response = await fetch('https://servicodados.ibge.gov.br/api/v1/localidades/estados');
        const estados = await response.json();
        const selectEstados = document.getElementById('estadosSelect');

        estados.forEach((estado) => {
            const option = document.createElement('option');
            option.value = estado.sigla;
            option.text = estado.nome;
            selectEstados.appendChild(option);
        });

        // Chama a função para popular as cidades quando o estado é selecionado
        popularCidades();
    } catch (error) {
        console.error('Erro ao carregar estados:', error);
    }
}

async function popularCidades() {
    const estadoSelecionado = document.getElementById('estadosSelect').value;
    const url = `https://servicodados.ibge.gov.br/api/v1/localidades/estados/${estadoSelecionado}/municipios`;

    try {
        const response = await fetch(url);
        const cidades = await response.json();
        const selectCidades = document.getElementById('cidadesSelect');

        // Limpa as opções existentes
        selectCidades.innerHTML = '';

        // Adiciona as cidades como opções no select
        cidades.forEach((cidade) => {
            const option = document.createElement('option');
            option.value = cidade.id;
            option.text = cidade.nome;
            selectCidades.appendChild(option);
        });
    } catch (error) {
        console.error('Erro ao carregar cidades:', error);
    }
}

// document.addEventListener('DOMContentLoaded', popularEstados);


// Função para abrir o modal
function abrirModal() {
    document.querySelector('.modal_agendar').style.display = 'block';
    document.querySelector('.overlay').style.display = 'block';
}

// Função para fechar o modal
function fecharModal() {
    document.querySelector('.modal_agendar').style.display = 'none';
    document.querySelector('.overlay').style.display = 'none';
}

// Função para gerar eventos aleatórios
function generateRandomEvents() {
    var events = [];
    for (var i = 0; i < 10; i++) { // Adicione quantos eventos você deseja
        var startDate = getRandomDate(new Date(2023, 0, 1), new Date(2023, 11, 31));
        var endDate = moment(startDate).add(1, 'hours'); // Evento com duração de 1 hora

        events.push({
            title: 'Meu Agendamento' + (i + 1),
            start: startDate,
            end: endDate,
            allDay: false
        });
    }
    return events;
}

// Função para gerar eventos aleatórios e adicionar eventos da localStorage
function generateEventsFromLocalStorage() {
    var events = [];

    // Adicionar eventos da localStorage
    var consultas = JSON.parse(localStorage.getItem("consultas")) || [];
    consultas.forEach(function (consulta) {
        events.push({
            title: consulta.nome,
            start: consulta.dataHora,
            end: moment(consulta.dataHora).add(1, 'hours'), // Duração de 1 hora
            allDay: false
        });
    });

    return events;
}

// Função para obter uma data aleatória dentro de um intervalo
function getRandomDate(start, end) {
    return new Date(start.getTime() + Math.random() * (end.getTime() - start.getTime()));
}
$(document).ready(function () {
    var calendar = $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,basicWeek,basicDay'
        },
        locale: 'pt-br',
        events: generateEventsFromLocalStorage(), // Adicione os eventos da localStorage

        eventClick: function (calEvent, jsEvent, view) {
            // Lidar com o clique em um evento (você pode personalizar essa parte conforme necessário)
            alert('Clique no evento:\n\nTítulo: ' + calEvent.title + '\nData: ' + calEvent.start.format('YYYY-MM-DD'));
        }
    });
    // Fechar o modal ao pressionar a tecla "Esc"
    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            fecharModal();
        }
    });
});