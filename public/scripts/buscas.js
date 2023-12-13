function buscarPaciente() {
    // Obter os valores do CPF e convênio
    var cpf = document.getElementById('cpfPaciente').value;
    var convenio = document.getElementById('convenio').value;

    // Simular um objeto JSON para enviar para a API
    var dadosConsulta = {
        cpf: cpf,
        convenio: convenio
    };

    // Simular chamada à API (substitua isso com a chamada real à sua API)
    $.ajax({
        url: 'sua_api_url_aqui',
        type: 'POST',
        data: JSON.stringify(dadosConsulta),
        contentType: 'application/json',
        success: function (data) {
            // Limpar a tabela
            $('#tabela-resultados tbody').empty();

            // Preencher a tabela com os resultados
            data.forEach(function (paciente) {
                var row = '<tr>' +
                    '<td>' + paciente.nome + '</td>' +
                    '<td>' + paciente.cpf + '</td>' +
                    '<td>' + paciente.convenio + '</td>' +
                    '</tr>';
                $('#tabela-resultados tbody').append(row);
            });
        },
        error: function (error) {
            console.error('Erro na busca: ', error);
        }
    });

    // Evitar o recarregamento da página
    return false;
}

function buscarConsultas() {
            // Obter os valores dos campos
            var cpfPaciente = document.getElementById('cpfPaciente').value;
            var dataConsulta = document.getElementById('data-consulta').value;
            var convenio = document.querySelector('input[placeholder="Convênio"]').value;

            // Montar o objeto JSON
            var dadosConsulta = {
                cpfPaciente: cpfPaciente,
                dataConsulta: dataConsulta,
                convenio: convenio
            };

            // Simular chamada à API (substitua isso com a chamada real à sua API)
            fetch('sua_api_url_aqui', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(dadosConsulta)
            })
            .then(response => response.json())
            .then(data => {
                // Limpar a tabela
                var tbody = document.querySelector('#tabela-resultados tbody');
                tbody.innerHTML = '';

                // Verificar se há resultados
                if (data.length > 0) {
                    // Preencher a tabela com os resultados
                    data.forEach(function (consulta) {
                        var row = '<tr>' +
                            '<td>' + consulta.nome + '</td>' +
                            '<td>' + consulta.cpf + '</td>' +
                            '<td>' + consulta.convenio + '</td>' +
                            '</tr>';
                        tbody.innerHTML += row;
                    });
                } else {
                    // Se não houver resultados, exibir uma linha indicando
                    var noResultsRow = '<tr><td colspan="3">Nenhum resultado encontrado.</td></tr>';
                    tbody.innerHTML = noResultsRow;
                }
            })
            .catch(error => console.error('Erro na busca: ', error));

            // Evitar o recarregamento da página
            return false;
        }