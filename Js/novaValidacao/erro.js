function apenasNumero(campo) {
    const valor = campo.value;
    const regex = /\D/g;

    campo.value = valor.replace(regex, '');
}

function adicionarMensagem(mensagem, campo) {
    const divPai = campo.parentNode;
    const spanErro = document.createElement('span');

    spanErro.className = 'erro';
    spanErro.textContent = mensagem;

    divPai.appendChild(spanErro);
}

function removerErro(campo) {
    const divPai = campo.parentNode;
    const spanErro = divPai.querySelector('.erro');

    if(spanErro) {
        divPai.removeChild(spanErro);
    }
}