function validarCampo(input) {
    const campo = input.target;
    const nomeCampo = campo.name
    const valor = campo.value; // Remover espaços em branco do início e do fim

    // Adicione a lógica de validação específica para cada campo conforme necessário
    switch (nomeCampo) {
        case 'Senha':
            verificarSenhaForte(valor);
            break
        case 'cpf':
            verifcaCpf(campo, valor);
            break;

    }
}

function verifcaCpf(campo, valor) {
    const verdade = testaCpf(String(valor));

    if (verdade) {
        removeErro(campo);
        return true;
    } else {
        exibiErro(campo);
    }
}

function verificarSenhaForte(senha) {
    const regexSenhaForte = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    const mensagemSenha = document.getElementById('mensagemSenha');

    if (!regexSenhaForte.test(senha)) {
        mensagemSenha.textContent = 'A senha deve conter letras maiúsculas, minúsculas, números e caracteres especiais.';
    } else {
        mensagemSenha.textContent = '';
    }
}