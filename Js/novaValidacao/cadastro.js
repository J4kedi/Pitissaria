function formatarCelular(campo) {
    const valor = campo.value;

    if (!regexCelular.test(valor)) {
        adicionarMensagem('Número de telefone inválido!', divPai);
    }
}


function apenasNumero(campo) {
    console.log(campo);
    
    const valor = campo.value;
    console.log(valor);

    const regex = /\D/g;
    campo.value = valor.replace(regex, '');
}