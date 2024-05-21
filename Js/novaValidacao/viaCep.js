function limparFormularioCep() {
    document.getElementsByName('cidade')[0].value = "";
    document.getElementsByName('rua')[0].value = "";
    document.getElementsByName('estado')[0].value = "";
}

function callback(conteudo) {
    if (!("erro" in conteudo)) {
        document.getElementsByName('rua')[0].value = (conteudo.logradouro);
        document.getElementsByName('cidade')[0].value = (conteudo.localidade);
        document.getElementsByName('estado')[0].value = (conteudo.uf);
    } else {
        let input = document.getElementsByName('cep')[0];
        limparFormularioCep();
        adicionarMensagem("Cep não encontrado!", input);
    }
}

function pesquisarCep(campo) {
    var valor = campo.value;
    const regex = /\D/g;
    const regexCepPadrao = /(\d{5})(\d{3})/;
    const cep = valor.replace(regex, "");

    if (cep != "") {
        var validaCep = /^[0-9]{8}$/;
        
        if(validaCep.test(cep)) {
            document.getElementsByName('rua')[0].value = "...";
            document.getElementsByName('cidade')[0].value= " ...";
            document.getElementsByName('estado')[0].value= " ...";

            var script = document.createElement('script');
            script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=callback';

            campo.value = valor.replace(regexCepPadrao, '$1-$2');

            document.body.appendChild(script);
        } else {
            limparFormularioCep();
            adicionarMensagem("Formato de CEP inválido", campo);
        }
    } else {
        limparFormularioCep();
        adicionarMensagem("Formato de CEP inválido", campo);
    }
}