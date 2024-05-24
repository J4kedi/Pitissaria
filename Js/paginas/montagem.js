const tamanhos = document.getElementById('tamanhos').querySelectorAll('input');
const quantidades = document.getElementsByName('quantidade');
var tamanhoAtual = document.getElementById('tamanhos').querySelector('input:checked');

var total = 0;
total += parseFloat(tamanhoAtual.value);

var ingredientes = [];

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
        });
    });

    quantidades.forEach(quantidade => {
        quantidade.addEventListener('input', function () {
            apenasNumero(this);
        });

        quantidade.addEventListener('blur', function () {
            ingredientes.push(this);
        });
    });
});