// Função de validar os espaços nos inputs ele não aceita o cadastro se todos os inputs
// não estiverem validos

function validarFormulario() {
    var nomeIngrediente = document.getElementById("nome_ingrediente").value;
    var dataValidade = document.getElementById("dt_validade").value;
    var quantidadeIngrediente = document.getElementById("quantidade_ingrediente").value;
    var precoCompra = document.getElementById("preco_compra").value;
    
    // Esta verificando se os inputs estão vazios fazendo as comparações
    if (nomeIngrediente === "" || dataValidade === "" || quantidadeIngrediente === "" || precoCompra === "") {
        alert("Por favor, preencha todos os campos do formulário.");
        return false;
    }
    return true;
}


function validarNumero(input) {
    // Remove qualquer caractere que não seja um número no caso o "e"
    input.value = input.value.replace(/[^\d]/g, '');
}