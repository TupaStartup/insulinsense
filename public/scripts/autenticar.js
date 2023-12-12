/*function autenticarUsuario() {
    // Recupere os valores dos campos de e-mail e senha
    var email = document.getElementById('emailInput').value;
    var senha = document.getElementById('senhaInput').value;

    // Construa o objeto de dados para a requisição
    var data = {
        email: email,
        senha: senha
    };

    // Faça uma requisição AJAX usando fetch para a sua API
    fetch('sua_api_endpoint', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(result => {
        // Lide com a resposta da API
        if (result.success) {
            alert('Login bem-sucedido!');
            // Redirecione ou faça o que for necessário após o login
        } else {
            alert('Falha no login. Verifique suas credenciais.');
        }
    })
    .catch(error => {
        console.error('Erro na requisição:', error);
    });

    // Retorna false para impedir o envio padrão do formulário
    return false;
} */

function autenticarUsuario() {
    // Recupere os valores dos campos de e-mail e senha
    var email = document.getElementById('emailInput').value;
    var senha = document.getElementById('senhaInput').value;
    // Verifique se as credenciais são fictícias (para teste)

    if (email == 'ws@gmail.com' && senha == '123') {
        alert('Login bem-sucedido! Redirecionando para a página de índice.');
        // Redirecione para a página de índice após o login bem-sucedido
        window.location.href = 'index.html';
    } else {
        alert('Falha no login. Verifique suas credenciais.');
    }

    // Retorna false para impedir o envio padrão do formulário
    return false;
}

/*function registroUsuario() {
    // Recupere os valores dos campos de registro
    var nome = document.getElementById('nomeInput').value;
    var email = document.getElementById('emailInput').value;
    var senha = document.getElementById('senhaInput').value;
    var confirmaSenha = document.getElementById('confirmaSenhaInput').value;

    // Verifique se as senhas coincidem
    if (senha !== confirmaSenha) {
        alert('As senhas não coincidem. Por favor, verifique.');
        return false;
    }

    // Construa o objeto de dados para a requisição
    var dadosUsuario = {
        nome: nome,
        email: email,
        senha: senha
    };

    // Faça uma requisição POST usando fetch para a sua API
    fetch('sua_api_endpoint/registro', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(dadosUsuario)
    })
    .then(response => response.json())
    .then(result => {
        // Lide com a resposta da API
        if (result.success) {
            alert('Registro bem-sucedido! Agora você pode fazer login.');
            // Redirecione para a página de login ou faça algo mais
            window.location.href = 'login.html';
        } else {
            alert('Falha no registro. Verifique suas informações.');
        }
    })
    .catch(error => {
        console.error('Erro na requisição:', error);
        alert('Erro durante o registro. Tente novamente mais tarde.');
    });

    // Retorna false para impedir o envio padrão do formulário
    return false;
}*/

function registroUsuario(){
    var senha = document.getElementById('senhaInput').value;
    var confirmaSenha = document.getElementById('confirmaSenhaInput').value;

    // Verifique se as senhas coincidem
    if (senha === confirmaSenha) {
        alert('Cadastro bem sucedido!');
        window.location.href = 'index.html';
    }
    else{
        alert('As senhas não coincidem, verifique!');
    }
}