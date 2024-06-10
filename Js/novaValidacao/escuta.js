const formulario = document.getElementById('form');

document.addEventListener('DOMContentLoaded', function () {
    const campos = document.querySelectorAll('input, select');
    var senha = "1";

    campos.forEach(campo => {        
        campo.addEventListener('focus', function() {
            removerErro(this);
        });

        campo.addEventListener('blur', function () {
            const nome = this.name;
            
            if (nome === 'email') {
                validarEmail(this);
            } else if (nome === 'senha') {
                senha = validarSenha(this);
            } else if (nome === 'confirmar-senha') {
                validarConfirmarSenha(this, senha);
            } else if (nome === 'cpf') {
                validarCpf(this);
            } else if (nome === 'data-nascimento') {
                validarDataNascimento(this);
            } else if (nome === 'celular') {
                validarCelular(this);
            } else if (nome === 'cep') {
                pesquisarCep(this);       
            } else {                
                validarCampoVazio(this);
            }
        });

        campo.addEventListener('input', function () {
            const nome = this.name;

            if (nome === 'confirmar-senha') {
                if (validarConfirmarSenha(this, senha)) {
                    removerErro(this);
                }
            }
            if (nome === 'cpf' || nome === 'celular' || nome === 'quantidade') {
                apenasNumero(this);
            };
        });
    });

    if (formulario != null) {
        formulario.addEventListener('submit', function(event) {
            const camposInvalidos = document.querySelectorAll('.erro');
    
            if (camposInvalidos.length > 0) {
                event.preventDefault();
                alert('Corrija os campos inválidos antes de enviar o formulário.');
            } else {
                tirarDisabled(elementos);
            }
        });
    }
});