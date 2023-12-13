function onFormSubmit() {
    // Lógica comum para processar o formulário

    // Retorne false para evitar o envio padrão do formulário
    return false;
}

// Função de Cadastrar nova consulta
function cadastrarConsulta() {
    // Obter os valores dos campos
    var cpfPaciente = document.getElementById('cpfPaciente').value;
    var dataConsulta = document.getElementById('data-consulta').value;
    var convenio = document.getElementById('convenio').value;
    var sexoBiologico = document.getElementById('sexoBiologico').value;
    var dataNascimento = document.getElementById('Data de Nascimento').value;
    var peso = document.getElementById('Peso/KG').value;
    var altura = document.getElementById('altura').value;
    var medidaCintura = document.getElementById('medida-cintura').value;
    var adiponectina = document.getElementById('adiponectina').value;
    var pressaoArterial = document.getElementById('press-arterial').value;

    // Montar o objeto JSON
    var dadosConsulta = {
        cpfPaciente: cpfPaciente,
        dataConsulta: dataConsulta,
        convenio: convenio,
        sexoBiologico: sexoBiologico,
        dataNascimento: dataNascimento,
        peso: peso,
        altura: altura,
        medidaCintura: medidaCintura,
        adiponectina: adiponectina,
        pressaoArterial: pressaoArterial
    };

    // Simular chamada à API (substitua isso com a chamada real à sua API)
    fetch('sua_api_url_cadastro_consulta', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(dadosConsulta)
    })
    .then(response => {
        if (response.ok) {
            // Exibir alerta se a consulta foi cadastrada com sucesso
            alert("Consulta cadastrada com sucesso!");
            // Pode adicionar mais ações aqui, se necessário
        } else {
            // Tratar erros aqui, se necessário
            alert("Erro ao cadastrar consulta. Por favor, tente novamente.");
        }
    })
    .catch(error => console.error('Erro no cadastro de consulta: ', error));

    // Evitar o recarregamento da página
    return false;
}


// Função do Cálculo de Sensibilidade
function calculoSensibilidade() {
    alert("Função calculoSensibilidade() chamada!");
    
    // Obter os valores dos campos
    var peso = document.getElementById('peso').value;
    var altura = document.getElementById('altura').value;
    var medidaCintura = document.getElementById('medida-cintura').value;
    var adiponectina = document.getElementById('adiponectina').value;
    var pressaoArterial = document.getElementById('press-arterial').value;
    var sexoBiologico = document.getElementById('sexoBiologico').value;
    // Montar o objeto JSON
    var dadosCalculo = {
        peso: peso,
        altura: altura,
        medidaCintura: medidaCintura,
        adiponectina: adiponectina,
        pressaoArterial: pressaoArterial,
        sexoBiologico: sexoBiologico
    };

    // Simular chamada à API (substitua isso com a chamada real à sua API)
    fetch('sua_api_url_calculo_sensibilidade', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(dadosCalculo)
    })
    .then(response => response.json())
    .then(data => {
        // Atualizar o conteúdo da tag <p> com o resultado
        var resultadoTag = document.getElementById('resultado');
        resultadoTag.textContent = 'Resultado: ' + data.resultado; // Substitua 'resultado' pelo nome real do campo retornado pela API
    })
    .catch(error => console.error('Erro no cálculo de sensibilidade: ', error));
}