function calcularTotal(campo, total) {
    if (campo.name != quantidade) {
        var divPai = campo.parentNode.parentNode;
    } else {
        var divPai = campo.parentNode;
    }

    var quantidade = divPai.querySelector('input[name="quantidade"]');
    var checkbox = divPai.querySelector('input[name^="checkbox-"]');
    var valor = quantidade.value;
    var precoIngrediente = checkbox.value;
    
    console.log(precoIngrediente)

    if (!checkbox.checked) {
        let valorInicial = precoIngrediente * valor;
        quantidade.value = 1;
        total -= valorInicial;
        return total.toFixed(2);
    } else {
        let valorFinal = precoIngrediente * valor;
        total += valorFinal;
        return parseFloat(total).toFixed(2);
    };
}