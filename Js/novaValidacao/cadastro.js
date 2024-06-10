function validarCampoVazio(campo) {
    const valor = campo.value;

    if (valor === '') {
        adicionarMensagem('Preencha o campo!', campo);
    }
}

function validarUsername(campo) {
    const valor = campo.value;

    fetch('../PHP/consultas/consultaUsername.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ username: valor })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            console.log(data.message);
        } else {
            console.error(data.message);
        }

        if (data.existe) {
            adicionarMensagem('Username já existente no sistema!', campo);
        }
    })
    .catch(error => {
        console.error(`Erro na requisição: `, error);
    })
}

function validarEmail(campo) {
    const valor = campo.value;
    const regexEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    if (!regexEmail.test(valor)) {
        adicionarMensagem('Email inválido!', campo);
    } else {
        fetch('../PHP/consultas/consultaEmail.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ email: valor })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log(data.message);
            } else {
                console.error(data.message);
            }
    
            if (data.existe) {
                adicionarMensagem('Email já existente no sistema!', campo);
            }
        })
        .catch(error => {
            console.error(`Erro na requisição: `, error);
        })
    }
}

function validarSenha(campo) {
    const senha = campo.value;

    if (senha.length < 8) {
        adicionarMensagem('A senha deve conter no mínimo 8 caracteres!', campo);
    } else if (!/[A-Z]/.test(senha)) {
        adicionarMensagem('A senha deve conter pelo menos uma letra maiúscula!', campo);
    } else if (!/[0-9]/.test(senha)) {
        adicionarMensagem('A senha deve conter pelo menos um número!', campo);
    } else if (!/[@$!%*?&]/.test(senha)) {
        adicionarMensagem('A senha deve conter pelo menos um caractere especial (@$!%*?&)!', campo);
    }

    return senha;
}

function validarConfirmarSenha(campo, senha) {
    if (campo.value != senha && !campo.parentNode.querySelector('.erro')) {
        adicionarMensagem("As senhas não coincidem", campo);
    } else {
        return true;
    }
}

function validarCpf(campo) {
    const valor = campo.value.toString();
    
    if (!testarCpf(valor)) {
        adicionarMensagem('CPF inválido!', campo);
    } else {
        fetch('../PHP/consultas/consultaCpf.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ cpf: valor })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log(data.message);
            } else {
                console.error(data.message);
            }

            if (data.existe) {
                adicionarMensagem('CPF já existente no sistema!', campo);
            }
        })
        .catch(error => {
            console.error(`Erro na requisição: `, error);
        })
    }
}

function validarDataNascimento(campo) {
    valor = new Date(campo.value);
    const hoje = new Date();
    const idade = hoje.getFullYear() - valor.getFullYear();

    if (idade < 14) {
        adicionarMensagem('Apenas para 14 anos ou mais', campo);
    } else if (idade > 120) {
        adicionarMensagem('Precisa ter menos que 120 anos', campo);
    }
}

function validarCelular(campo) {
    if (campo.value.length == 10) {
        campo.value = campo.value.slice(0, 2) + '9' + campo.value.slice(2);
    }

    const valor = campo.value;
    
    const regexCelularPadrao = /(\d{2})(\d{5})(\d{4})/;
    const regexCelularTest = /^\(?[1-9]{2}\)?\s?9[1-9]\d{3}-?\d{4}$/;

    if (!regexCelularTest.test(valor)) {
        adicionarMensagem('Número de celular inválido!', campo);
    } else {
        campo.value = valor.replace(regexCelularPadrao, '($1) $2-$3');
    }
}