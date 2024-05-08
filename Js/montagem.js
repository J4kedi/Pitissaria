document.getElementById('calcular-total').addEventListener('click', function() {
    var total = 0;
    var tamanho = document.querySelector('input[name="tamanho"]:checked');
    var queijo = document.getElementById('queijo').checked;
    var tomate = document.getElementById('tomate').checked;

    if (tamanho) {
        if (tamanho.id === 'pequena') {
            total += 25;
        } else if (tamanho.id === 'media') {
            total += 35;
        } else if (tamanho.id === 'grande') {
            total += 69;
        }
    }

    if (queijo) {
        total += 7;
    }

    if (tomate) {
        total += 1;
    }

    document.getElementById('total').textContent = 'Total: R$ ' + total.toFixed(2);
});
