function calcularTotal() {
    var total = 0;
    var tamanho = document.querySelector('input[name="tamanho"]:checked');
    var queijo = document.getElementById('queijo');
    var tomate = document.getElementById('tomate');
    var calabresa = document.getElementById('calabresa');
    var pepperoni = document.getElementById('pepperoni');
    var azeitona = document.getElementById('azeitona');
    var cebola = document.getElementById('cebola');

    var quantidadeQueijo = parseInt(document.getElementById('quantidade_queijo').value) || 0;
    var quantidadeTomate = parseInt(document.getElementById('quantidade_tomate').value) || 0;
    var quantidadeCalabresa = parseInt(document.getElementById('quantidade_calabresa').value) || 0;
    var quantidadePepperoni = parseInt(document.getElementById('quantidade_pepperoni').value) || 0;
    var quantidadeAzeitona = parseInt(document.getElementById('quantidade_azeitona').value) || 0;
    var quantidadeCebola = parseInt(document.getElementById('quantidade_cebola').value) || 0;

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
    if (calabresa.checked) {
        ingredientes.push({ id: calabresa.getAttribute('data-id'), quantidade: quantidadeCalabresa });
    }
    if (pepperoni.checked) {
        ingredientes.push({ id: pepperoni.getAttribute('data-id'), quantidade: quantidadePepperoni });
    }
    if (azeitona.checked) {
        ingredientes.push({ id: azeitona.getAttribute('data-id'), quantidade: quantidadeAzeitona });
    }
    if (cebola.checked) {
        ingredientes.push({ id: cebola.getAttribute('data-id'), quantidade: quantidadeCebola });
    }

    if (ingredientes.length > 0) {
        // Verifica a disponibilidade dos ingredientes e calcula o total
        fetch('../HTML/verificar_ingredientes.php', {
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
                    let nomeIngrediente;
                    switch (ingrediente.id) {
                        case queijo.getAttribute('data-id'):
                            nomeIngrediente = 'Queijo';
                            break;
                        case tomate.getAttribute('data-id'):
                            nomeIngrediente = 'Tomate';
                            break;
                        case calabresa.getAttribute('data-id'):
                            nomeIngrediente = 'Calabresa';
                            break;
                        case pepperoni.getAttribute('data-id'):
                            nomeIngrediente = 'Pepperoni';
                            break;
                        case azeitona.getAttribute('data-id'):
                            nomeIngrediente = 'Azeitona';
                            break;
                        case cebola.getAttribute('data-id'):
                            nomeIngrediente = 'Cebola';
                            break;
                    }
                    mensagem += `${nomeIngrediente} indisponível. `;
                    podeAdicionar = false;
                }
            });

            if (podeAdicionar) {
                if (queijo.checked) {
                    total += 3 * quantidadeQueijo;
                }
                if (tomate.checked) {
                    total += 2 * quantidadeTomate;
                }
                if (calabresa.checked) {
                    total += 4 * quantidadeCalabresa;
                }
                if (pepperoni.checked) {
                    total += 5 * quantidadePepperoni;
                }
                if (azeitona.checked) {
                    total += 2.5 * quantidadeAzeitona;
                }
                if (cebola.checked) {
                    total += 1.5 * quantidadeCebola;
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
    } else {
        // Atualiza o total se não há ingredientes selecionados
        document.getElementById('total').textContent = 'Total: R$ ' + total.toFixed(2);
        document.getElementById('mensagem-disponibilidade').textContent = '';
    }
}

// Adiciona eventos de mudança aos checkboxes e campos de quantidade
document.getElementById('queijo').addEventListener('change', calcularTotal);
document.getElementById('quantidade_queijo').addEventListener('input', calcularTotal);
document.getElementById('tomate').addEventListener('change', calcularTotal);
document.getElementById('quantidade_tomate').addEventListener('input', calcularTotal);
document.getElementById('calabresa').addEventListener('change', calcularTotal);
document.getElementById('quantidade_calabresa').addEventListener('input', calcularTotal);
document.getElementById('pepperoni').addEventListener('change', calcularTotal);
document.getElementById('quantidade_pepperoni').addEventListener('input', calcularTotal);
document.getElementById('azeitona').addEventListener('change', calcularTotal);
document.getElementById('quantidade_azeitona').addEventListener('input', calcularTotal);
document.getElementById('cebola').addEventListener('change', calcularTotal);
document.getElementById('quantidade_cebola').addEventListener('input', calcularTotal);
document.getElementById('calcular-total').addEventListener('click', calcularTotal);

// Adiciona eventos de mudança aos tamanhos
document.querySelectorAll('input[name="tamanho"]').forEach(input => {
    input.addEventListener('change', calcularTotal);
});
