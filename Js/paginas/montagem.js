const tamanhos = document.getElementById('tamanhos').querySelectorAll('input');
const quantidades = document.getElementsByName('quantidade');
const inputIngredientes = document.querySelectorAll('label[class*="1"] input');
const botaoEnviar = document.querySelector('.preco button');
const mensagem = mensagemTotal.textContent;
var tamanhoAtual = document.getElementById('tamanhos').querySelector('input:checked');

var total = 0;
total += parseFloat(tamanhoAtual.value);
mensagemTotal.textContent = mensagem + total;

document.addEventListener('DOMContentLoaded', function () {
    var isChecked = new Map();

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
            if (isChecked.has(input)) {
                if (input.checked) {
                    isChecked.get(input).checked = true;
                } else {
                    isChecked.get(input).checked = false;
                };
            } else if (input.checked) {
                isChecked.set(input, {checked : true});
            };

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
        let checked = null; 
        isChecked.forEach((v, k) => {checked = checked != null ? checked : (v.checked ? k : null)});

        if (checked) {
            enviarDadosIngredientes(ingredientes);
        } else {
            event.preventDefault();
            console.log("não enviou :(")
        }
    });
});