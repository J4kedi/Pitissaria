function validaCampo(input) {
    const campo = input.target;
    const nomeCampo = campo.name
    const valor = campo.value;

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
        case 'data de nascimento':
            verficaData(campo, valor);
            break;
        case 'telefone':
            verificaTelefone(campo, valor);
            break;
    }
}

function verificaTelefone(campo, valor) {
    const divPai = campo.parentNode;
    const spanErro = divPai.querySelector('.erro');

    if(spanErro !== null) {
        spanErro.remove();
    }

    if(valor.length < 11) {
        adicionarMensagem('Telefone precisa conter 11 dígitos', divPai);
    }
}

function verificaCampoVazio(input) {
    const campo = input.target;
    const divPai = campo.parentNode;
    const spanErro = divPai.querySelector('.erro');

    if(spanErro !== null) {
        spanErro.remove();
    }

    if(campo.value == '') {
        adicionarMensagem('Preencha o campo!', divPai);
    } else if ((campo.name == 'username' || campo.name == 'nome') && campo.value.length < 4) {
        adicionarMensagem(`Deve conter mais que 4 caracteres!`, divPai)
    }
}

function verficaData(campo, valor) {
    valor = new Date(valor);
    const hoje = new Date();
    const idade = hoje.getFullYear() - valor.getFullYear();
    
    const divPai = campo.parentNode;

    var erro = false;

    if (idade < 14) {
        adicionarMensagem('data inválida', divPai);
        erro = true;
    } else if (idade > 120) {
        adicionarMensagem('data inválida', divPai);
        erro = true;
    }

    if (erro) {
        return true;
    }
}

function verificaEmail(campo, valor) {
    const regexEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    removeErro(campo)

    if(!regexEmail.test(valor) && valor !== '') {
        exibiErro(campo)
    } else {
        removeErro(campo)
    }

    return;
}

function verifcaCpf(campo, valor) {
    const verdade = testaCpf(String(valor));

    if(!verdade && valor !== '') {
        exibiErro(campo);
    } else {
        removeErro(campo);
        return true;
    }
}

function verificaSenhaForte(campo, senha) {
    const regexMaiuscula = /(?=.*[A-Z])/;
    const regexCharEspecial = /(?=.*[@$!%*?&])/;
    const divPai = campo.parentNode;
    let divSenha = divPai.querySelector('.senha');
    let erro = false;

    if (divSenha === null) {
        divSenha = document.createElement('div');
        divSenha.classList.add('senha');
        divPai.appendChild(divSenha);
    } else {
        divSenha.innerHTML = ''; // Limpa o conteúdo existente
    }

    if (!senha.match(regexMaiuscula)) {
        adicionarMensagem('Precisa conter ao menos uma letra maiúscula!', divSenha);
        erro = true;
    }

    if (!senha.match(regexCharEspecial)) {
        adicionarMensagem('Precisa de um caractere especial. @!#$%', divSenha);
        erro = true;
    }

    if (senha.length < 8) {
        adicionarMensagem('A senha deve conter no mínimo 8 caracteres!', divSenha);
        erro = true;
    }

    if (erro) {
        return true;
    }
}

function adicionarMensagem(mensagem, campo) {
    const input = campo.querySelector('input');
    const div = document.createElement('div');
    const span = document.createElement('span');

    div.classList.add('senha');
    
    if (input !== null) {    
        input.classList.add('input-erro');
    }

    span.textContent = mensagem;
    span.classList.add('erro');
    span.classList.add('mensagem');

    
    div.appendChild(span);
    campo.appendChild(div);
}