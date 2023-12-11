function cadastrarConsulta() {
    // Obter os valores dos campos de input
    var nomePaciente = document.getElementById('nome-paciente').value;
    var dataConsulta = document.getElementById('data-consulta').value;
    var convenio = document.getElementById('convenio').value;
    var dataNascimento = document.getElementById('Data de Nascimento').value;
    var peso = document.getElementById('Peso/KG').value;
    var altura = document.getElementById('altura').value;
    var medidaCintura = document.getElementById('medida-cintura').value;
    var adiponectina = document.getElementById('adiponectina').value;
    var pressaoArterial = document.getElementById('press-arterial').value;

    // Validar os campos se necessário
    // ...

    // Criar um objeto com os dados da consulta
    var consultaData = {
        nomePaciente: nomePaciente,
        dataConsulta: dataConsulta,
        convenio: convenio,
        dataNascimento: dataNascimento,
        peso: peso,
        altura: altura,
        medidaCintura: medidaCintura,
        adiponectina: adiponectina,
        pressaoArterial: pressaoArterial
    };

    // Enviar os dados para onde quer que você queira processar o cadastro
    // ...

    // Retorna false para evitar o envio do formulário, já que você está usando onsubmit
    return false;
}
