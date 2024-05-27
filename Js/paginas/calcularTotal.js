var ingredientes = new Map();

function calcularTotal(campo, total) {
    total = parseFloat(total);
    const divPai = campo.closest('.card');
    const quantidade = divPai.querySelector('input[name="quantidade"]');
    const checkbox = divPai.querySelector('input[name^="checkbox-"]');
    const nome = divPai.querySelector('p[name="nome"]').textContent;
    const precoIngrediente = parseFloat(checkbox.value);
    const idIngrediente = divPai.id;

    if (checkbox.checked) {
        quantidade.value = Math.min(quantidade.value, 10);

        if (ingredientes.has(idIngrediente)) {
            const ingrediente = ingredientes.get(idIngrediente);
            const quantidadeAnterior = parseInt(ingrediente.quantidade);
            const novaQuantidade = parseInt(quantidade.value);
            const diferenca = Math.abs(novaQuantidade - quantidadeAnterior);

            if (quantidadeAnterior < novaQuantidade) {
                ingrediente.quantidade = novaQuantidade;

                total += precoIngrediente * diferenca;
            } else {
                ingrediente.quantidade = novaQuantidade;
                total -= precoIngrediente * diferenca;
            }
        } else {
            ingredientes.set(idIngrediente, { quantidade: quantidade.value, nome: nome});

            total += precoIngrediente * quantidade.value;
        }
    } else {
        quantidade.value = 1;
        total -= precoIngrediente * ingredientes.get(idIngrediente).quantidade;
        ingredientes.delete(idIngrediente);
    }

    return total;
}