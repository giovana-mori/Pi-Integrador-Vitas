const basico = document.getElementById("ul-basic")
const listbasic = ["Agendamento", "Cadastro de pacientes", "Confirmação de consultas por Whatsapp", "Lembretes de consultas"]

listbasic.forEach(item => {
    basico.innerHTML += `
    <li><img src="static/images/correct.svg" alt="icone correto">${item}</li>
    `
});

const plus = document.getElementById("ul-plus")
const listplus = ["Agendamento", "Cadastro de pacientes", "Confirmação de consultas por Whatsapp", "Lembretes de consultas", "Pedidos de exames", "Prescrição digital"]

listplus.forEach(item => {
    plus.innerHTML += `
    <li><img src="static/images/correct.svg" alt="icone correto">${item}</li>
    `
});

const premium = document.getElementById("ul-premium")
const listpremium = ["Agendamento", "Cadastro de pacientes", "Confirmação de consultas por Whatsapp", "Lembretes de consultas", "Pedidos de exames", "Prescrição digital", "Telemedicina", " Marketing digital para Médicos"]

listpremium.forEach(item => {
    premium.innerHTML += `
    <li><img src="static/images/correct.svg" alt="icone correto">${item}</li>
    `
});