function apenasNumero(campo) {
    const valor = campo.value;
    const regex = /\D/g;

    campo.value = valor.replace(regex, '');
    if (campo.name === 'quantidade' && valor > 9) {
        campo.value = 10;
    };
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