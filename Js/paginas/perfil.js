const select = document.getElementById('endereco');
var enderecos = [];

select.addEventListener('change', function() {
    var cep = document.getElementsByName('cep')[0];
    var estado = document.getElementsByName('estado')[0];
    var cidade = document.getElementsByName('cidade')[0];
    var rua = document.getElementsByName('rua')[0];
    var numRes = document.getElementsByName('num-res')[0];
        
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

        cep.removeAttribute('disabled');
        estado.removeAttribute('disabled');
        cidade.removeAttribute('disabled');
        rua.removeAttribute('disabled');
        numRes.removeAttribute('disabled');

        cep.classList.remove('desativado');
        estado.classList.remove('desativado');
        cidade.classList.remove('desativado');
        rua.classList.remove('desativado');
        numRes.classList.remove('desativado');
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

                cep.setAttribute('disabled', 'true');
                estado.setAttribute('disabled', 'true');
                cidade.setAttribute('disabled', 'true');
                rua.setAttribute('disabled', 'true');
                numRes.setAttribute('disabled', 'true');

                cep.classList.add('desativado');
                estado.classList.add('desativado');
                cidade.classList.add('desativado');
                rua.classList.add('desativado');
                numRes.classList.add('desativado');
            }
        });
    }
});