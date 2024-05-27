const mensagemTotal = document.querySelector('.preco p')
const divPai = mensagemTotal.parentNode;
var indisponiveis = [];

function enviarDadosIngredientes(ingredientes) {
    fetch('../PHP/consultas/verificaIngredientes.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ ingredientes: Object.fromEntries(ingredientes) })
    })
    .then(response => response.json())
    .then(data => {
        ingredientes.forEach(ingrediente => {
            if (!data[ingrediente.id] && data.length != 0) {
                indisponiveis.push(ingrediente.id);
            };
        });

        if (typeof indisponiveis[0] !== 'undefined') {
            let p = document.createElement('p');
            p.textContent = `Ingrediente indisponíveis: `;

            indisponiveis.forEach(id => {
                let ingrediente = ingredientes.get(id);
                p.textContent += `${ingrediente.nome} `;
            });

            divPai.appendChild(p);
        }
    })
    .catch(error => {
        console.error('Erro:', error);
        if (document.getElementsByClassName('erro')[0] == null) {
            let p = document.createElement('p');
            p.textContent = 'Erro ao verificar a disponibilidade dos ingredientes.';
            p.classList.add('erro');
            divPai.appendChild(p);
        }
        mensagemTotal.textContent = 'Total: R$ 0.00';
    });
}