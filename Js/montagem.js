// Funcao para calcular o total
function calcularTotal() {
    var total = 0;
    var tamanho = document.querySelector('input[name="tamanho"]:checked');
    var queijo = document.getElementById('queijo');
    var tomate = document.getElementById('tomate');
    var quantidadeQueijo = parseInt(document.getElementById('quantidade_queijo').value) || 0;
    var quantidadeTomate = parseInt(document.getElementById('quantidade_tomate').value) || 0;

    if (tamanho) {
        total += parseInt(tamanho.value);
    }

    var ingredientes = [];

    if (queijo.checked) {
        ingredientes.push({ id: queijo.getAttribute('data-id'), quantidade: quantidadeQueijo });
    }

    if (tomate.checked) {
        ingredientes.push({ id: tomate.getAttribute('data-id'), quantidade: quantidadeTomate });
    }

    // Verifica a disponibilidade dos ingredientes e calcula o total
    fetch('../PHP/verificar_ingredientes.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ ingredientes: ingredientes })
    })
    .then(response => response.json())
    .then(data => {
        let mensagem = '';
        let podeAdicionar = true;

        ingredientes.forEach(ingrediente => {
            if (!data[ingrediente.id]) {
                let nomeIngrediente = ingrediente.id == queijo.getAttribute('data-id') ? 'Queijo' : 'Tomate';
                mensagem += `${nomeIngrediente} indisponível. `;
                podeAdicionar = false;
            }
        });

        if (podeAdicionar) {
            if (queijo.checked) {
                total += 7 * quantidadeQueijo;
            }
            if (tomate.checked) {
                total += 1 * quantidadeTomate;
            }
            document.getElementById('total').textContent = 'Total: R$ ' + total.toFixed(2);
            document.getElementById('mensagem-disponibilidade').textContent = '';
        } else {
            document.getElementById('mensagem-disponibilidade').textContent = mensagem;
            document.getElementById('total').textContent = 'Total: R$ 0.00';
        }
    })
    .catch(error => {
        console.error('Erro:', error);
        document.getElementById('mensagem-disponibilidade').textContent = 'Erro ao verificar a disponibilidade dos ingredientes.';
        document.getElementById('total').textContent = 'Total: R$ 0.00';
    });
}

// Adiciona eventos de mudanca as checkboxes e campos de quantidade
document.getElementById('queijo').addEventListener('change', calcularTotal);
document.getElementById('quantidade_queijo').addEventListener('input', calcularTotal);
document.getElementById('tomate').addEventListener('change', calcularTotal);
document.getElementById('quantidade_tomate').addEventListener('input', calcularTotal);
document.getElementById('calcular-total').addEventListener('click', calcularTotal);
