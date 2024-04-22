function numero(input) {
    // carrega campo com o input
    const campo = input.target
    // limpa o erro
    removeErro(campo);
    // carrega o valor que está no input, novo valor colocado pelo usuario
    const valor = campo.value;
    // regex que permite apenas números
    const regex = /\D/g;

    // substitui pelo valor vazio, caso não seja um número
    campo.value = valor.replace(regex, '');
}