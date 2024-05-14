// Funcao para calcular o total
function calcularTotal() {
    var total = 0;
    var tamanho = document.querySelector('input[name="tamanho"]:checked');
    var queijo = document.getElementById('queijo').checked;
    var tomate = document.getElementById('tomate').checked;
    var quantidadeQueijo = parseInt(document.getElementById('quantidade_queijo').value) || 0;
    var quantidadeTomate = parseInt(document.getElementById('quantidade_tomate').value) || 0;

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
        total += 7 * quantidadeQueijo;
    }

    if (tomate) {
        total += 1 * quantidadeTomate;
    }

    document.getElementById('total').textContent = 'Total: R$ ' + total.toFixed(2);
}

// Adiciona eventos de mudanca as checkboxes e campos de quantidade
document.getElementById('queijo').addEventListener('change', calcularTotal);
document.getElementById('quantidade_queijo').addEventListener('input', calcularTotal);
document.getElementById('tomate').addEventListener('change', calcularTotal);
document.getElementById('quantidade_tomate').addEventListener('input', calcularTotal);
document.getElementById('calcular-total').addEventListener('click', calcularTotal);
