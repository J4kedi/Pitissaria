const tamanhos = document.getElementById('tamanhos').querySelectorAll('input');
const quantidades = document.getElementsByName('quantidade');
const inputIngredientes = document.querySelectorAll('label[class*="1"] input');
const botaoEnviar = document.querySelector('.preco button');
var mensagemTotal = document.querySelector('.preco p');
const mensagem = mensagemTotal.textContent;
var tamanhoAtual = document.getElementById('tamanhos').querySelector('input:checked');

var total = 0;
total += parseFloat(tamanhoAtual.value);
mensagemTotal.textContent = mensagem + total;

document.addEventListener('DOMContentLoaded', function () {
    tamanhos.forEach(tamanho => {
        tamanho.addEventListener('change', function () {
            if (tamanhoAtual != tamanho && tamanho.checked) {
                tamanhoAtual.checked = false;

                total -= parseFloat(tamanhoAtual.value);

                tamanhoAtual = tamanho;
                total += parseFloat(tamanhoAtual.value);
            }

            if (!tamanhoAtual.checked) {
                tamanhoAtual.checked = true;
            }
        
            mensagemTotal.textContent = mensagem + total.toFixed(2);
        });
    });
    
    inputIngredientes.forEach(input => {
        input.addEventListener('change', function () {
            if (input.checked) {

            }

            total = calcularTotal(input, total);
            mensagemTotal.textContent = mensagem + total.toFixed(2);
        });
    });
    
    quantidades.forEach(quantidade => {
        quantidade.addEventListener('input', function () {
            total = calcularTotal(quantidade, total);
            mensagemTotal.textContent = mensagem + total.toFixed(2);
        });
    });

    botaoEnviar.addEventListener('click', function (event) {
        if (total == 0) {
            event.preventDefault();
        }
    });
});