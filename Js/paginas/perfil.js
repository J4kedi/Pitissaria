const select = document.getElementById('endereco');

select.addEventListener('change', function() {
    var cep = document.getElementsByName('cep')[0];
    var estado = document.getElementsByName('estado')[0];
    var cidade = document.getElementsByName('cidade')[0];
    var rua = document.getElementsByName('rua')[0];
    var numRes = document.getElementsByName('num-res')[0];

    // Verifica se a opção selecionada é "novo"
    if (select.value === 'novo') {
        // Limpa os valores dos inputs
        cep.value = '';
        estado.value = '';
        cidade.value = '';
        rua.value = '';
        numRes.value = '';

        // Remove o atributo disabled dos inputs
        estado.removeAttribute('disabled');
        cidade.removeAttribute('disabled');

        // Remove a classe "desativado" dos inputs
        estado.classList.remove('desativado');
        cidade.classList.remove('desativado');
    }
});