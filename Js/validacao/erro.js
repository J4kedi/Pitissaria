function exibiErro(campo) {
    const elemento = document.querySelector('.erro');

    if(elemento !== null) {
        return;
    }

    const spanErro = document.createElement('span');

    spanErro.textContent = `${campo.name} inválido!`;
    spanErro.classList.add("erro");
    campo.classList.add("input-erro");

    const divPai = campo.parentNode;

    divPai.appendChild(spanErro);
}

function removeErro() {
    const elemento = document.querySelector('.erro');
    const elementoInput = document.querySelector('.input-erro');

    if(elemento !== null) {
        elemento.remove();
    }

    if(elementoInput !== null) {
        elementoInput.classList.remove('input-erro');
    }
}