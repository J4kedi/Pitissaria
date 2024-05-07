document.getElementById('calcular-total').addEventListener('click', function() {
    var tamanho = document.querySelector('input[name="tamanho"]:checked');
    var queijo = document.getElementById('queijo').checked;
    var tomate = document.getElementById('tomate').checked;

    var precoBase = 0;
    if (tamanho) {
        if (tamanho.id === 'pequena') {
            precoBase += 10;
        } else if (tamanho.id === 'media') {
            precoBase += 15;
        } else if (tamanho.id === 'grande') {
            precoBase += 20;
        }
    }

    if (queijo) {
        precoBase += 2;
    }

    if (tomate) {
        precoBase += 1;
    }

    document.getElementById('total').textContent = 'Total: R$ ' + precoBase.toFixed(2);
});
