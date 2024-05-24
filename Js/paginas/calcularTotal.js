function calcularTotal(campo, total) {
    


    return total;
}

function resetarQuantidade(campo) {
    if (campo.name != 'quantidade') {
        const divPai = campo.parentNode.parentNode;

        if (!campo.checked) {
            let quantidade = divPai.querySelector('input[name="quantidade"]');
            quantidade.value = 1;
        }
    } else {
        const divPai = campo.parentNode;
        let checkbox = divPai.querySelector('input[name^="checkbox-"]');

        if (!checkbox.checked) {
            campo.value = 1;
        }
    }
}