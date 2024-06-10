const mensagemTotal = document.querySelector('.preco p')
const divPai = mensagemTotal.parentNode;
var indisponiveis = [];

async function enviarDadosIngredientes(ingredientes) {
    indisponiveis = [];
    try {
        const response = await fetch('../PHP/consultas/verificaIngredientes.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ ingredientes: Object.fromEntries(ingredientes) })
        });

        const data = await response.json();

        ingredientes.forEach((ingrediente, id) => {
            if (!data[id] && data.length !== 0) {
                indisponiveis.push(id);
            }
        });

        if (indisponiveis.length > 0) {
            let p = document.createElement('p');
            p.textContent = 'Ingredientes indisponíveis: ';

            indisponiveis.forEach(id => {
                let ingrediente = ingredientes.get(id);
                if (ingrediente) {
                    p.textContent += `${ingrediente.nome} `;
                }
            });

            divPai.appendChild(p);
            return false;
        } else {
            return true;
        }
    } catch (error) {
        console.error('Erro:', error);
        if (document.getElementsByClassName('erro')[0] == null) {
            let p = document.createElement('p');
            p.textContent = 'Erro ao verificar a disponibilidade dos ingredientes.';
            p.classList.add('erro');
            divPai.appendChild(p);
        }
        mensagemTotal.textContent = 'Total: R$ 0.00';
        return false;
    }
}
