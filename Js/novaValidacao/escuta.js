const formulario = document.getElementById('form');

document.addEventListener('DOMContentLoaded', function () {
    const campos = document.querySelectorAll('input, select');
    
    campos.forEach(campo => {
        campo.addEventListener('focus', function() {
            return;
        });
        campo.addEventListener('blur', function () {
            if (this.name === 'telefone') {
                formatarCelular(this);
            }
        });
        campo.addEventListener('input', function () {
            return;
        });
    });
});