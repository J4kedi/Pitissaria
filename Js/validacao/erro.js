function exibiErro(campo) {
    const elemento = campo.querySelector('.erro');
    var ultimaLetra = 'o';

    if(elemento !== null) {
        return;
    }

    const spanErro = document.createElement('span');

    if(campo.name.slice(-1) === 'a') {
        ultimaLetra = 'a';
    }

    spanErro.textContent = `Formato de ${campo.name} inválid${ultimaLetra}!`;
    spanErro.classList.add("erro");
    spanErro.classList.add("mensagem");
    campo.classList.add("input-erro");

    const divPai = campo.parentNode;

    divPai.appendChild(spanErro);
}

function removeErro(campo) {
    const divPai = campo.parentNode;

    const elemento = divPai.querySelector('.erro');
    const elementoInput = divPai.querySelector('.input-erro');

    if(elemento !== null) {
        elemento.remove();
    }

    if(elementoInput !== null) {
        elementoInput.classList.remove('input-erro');
    }
}