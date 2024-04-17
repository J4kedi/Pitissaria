// Função para validar o formulário antes de enviar
function validarFormulario() {
    // Obter os valores dos campos do formulário
    var nomeIngrediente = document.getElementById("nome_ingrediente").value;
    var dataValidade = document.getElementById("dt_validade").value;
    var quantidadeIngrediente = document.getElementById("quantidade_ingrediente").value;
    var precoCompra = document.getElementById("preco_compra").value;
    
    // Verificar se todos os campos estão preenchidos
    if (nomeIngrediente === "" || dataValidade === "" || quantidadeIngrediente === "" || precoCompra === "") {
        // Mostrar um alerta se algum campo estiver vazio
        alert("Por favor, preencha todos os campos do formulário.");
        return false; // Impedir o envio do formulário
    }
    return true; // Permitir o envio do formulário se todos os campos estiverem preenchidos
}

// Função para validar a entrada de números nos campos
function validarNumero(input) {
    // Remover caracteres que não sejam números (0-9)
    input.value = input.value.replace(/[^\d]/g, '');
}