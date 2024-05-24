const tamanhos = document.getElementById('tamanhos').querySelectorAll('input');
const quantidades = document.getElementsByName('quantidade');
const inputIngredientes = document.querySelectorAll('label[class*="1"] input');
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
        
            mensagemTotal.textContent = mensagem + total;
        });
    });
    
    inputIngredientes.forEach(input => {
        input.addEventListener('change', function () {
            total = calcularTotal(input, total);
            mensagemTotal.textContent = mensagem + total;

            resetarQuantidade(input);
        });
    });
    
    quantidades.forEach(quantidade => {
        quantidade.addEventListener('input', function () {
            apenasNumero(this);
        });

        quantidade.addEventListener('blur', function () {
            total = calcularTotal(quantidade, total);
            mensagemTotal.textContent = mensagem + total;

            resetarQuantidade(quantidade);
        });
    });
});