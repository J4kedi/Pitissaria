function validaCampo(input) {
    const campo = input.target;
    const nomeCampo = campo.name
    const valor = campo.value; // Remover espaços em branco do início e do fim

    // Adicione a lógica de validação específica para cada campo conforme necessário
    switch (nomeCampo) {
        case 'senha':
            verificaSenhaForte(campo, valor);
            break
        case 'cpf':
            verifcaCpf(campo, valor);
            break;
        case 'email':
            verificaEmail(campo, valor);
            break;
    }
}

function verificaEmail(campo, valor) {
    return;
}

function verifcaCpf(campo, valor) {
    const verdade = testaCpf(String(valor));

    if(verdade) {
        removeErro(campo);
        return true;
    } else {
        exibiErro(campo);
    }
}

function verificaSenhaForte(campo, senha) {
    const regexMaiuscula = /(?=.*[A-Z])/;
    const regexCharEspecial = /(?=.*[@$!%*?&])/;
    const divPai = campo.parentNode;
    let divSenha = document.querySelector('.senha');
    let erro = false;

    if (divSenha === null) {
        divSenha = document.createElement('div');
        divSenha.classList.add('senha');
        divPai.appendChild(divSenha);
    } else {
        divSenha.innerHTML = ''; // Limpa o conteúdo existente
    }

    if (!senha.match(regexMaiuscula)) {
        adicionarMensagem('Precisa conter ao menos uma letra maiúscula!');
        erro = true;
    }

    if (!senha.match(regexCharEspecial)) {
        adicionarMensagem('Precisa de um caractere especial. @!#$%');
        erro = true;
    }

    if (senha.length < 8) {
        adicionarMensagem('A senha deve conter no mínimo 8 caracteres!');
        erro = true;
    }

    if (erro) {
        campo.classList.add('input-erro');
    } else {
        campo.classList.remove('input-erro');
    }

    function adicionarMensagem(mensagem) {
        const span = document.createElement('span');
        span.textContent = mensagem;
        divSenha.appendChild(span);
    }
}
