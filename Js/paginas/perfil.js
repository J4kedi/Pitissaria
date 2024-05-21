const select = document.getElementById('endereco');
var enderecos = [];

select.addEventListener('change', function() {
    var selectedIndex = select.selectedIndex;   
    var enderecoSplit = select.options[selectedIndex].textContent.split(', ');

    var endereco = {
        rua: enderecoSplit[0],
        numRes: enderecoSplit[1],
        cep: enderecoSplit[2],
        cidade: enderecoSplit[3],
        estado: enderecoSplit[4],
    };

    if (select.value === 'novo') {
        cep.value = '';
        estado.value = '';
        cidade.value = '';
        rua.value = '';
        numRes.value = '';

        tirarDisabled(elementos);
    } else {
        if(enderecos.length == 0) {
            enderecos.push(endereco);
        }

        enderecos.forEach(enderec => {
            if(enderec.option != endereco.option) {
                enderecos.push(endereco);
            } else {
                cep.value = endereco.cep;
                estado.value = endereco.estado;
                cidade.value = endereco.cidade;
                rua.value = endereco.rua;
                numRes.value = endereco.numRes;

                adicionarDisabled(elementos);
            }
        });
    }
});

function tirarDisabled (elementos) {
    elementos.forEach(elemento => {
        elemento.removeAttribute('disabled');
        elemento.classList.remove('desativado');
    });
}

function adicionarDisabled (elementos) {
    elementos.forEach(elemento => {
        elemento.setAttribute('disabled', 'true');
        elemento.classList.add('desativado');
    });
}