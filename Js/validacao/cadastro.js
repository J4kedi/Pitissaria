function validarForm() {
    // Regex para validar CPF
    const cpfRegex = /^[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}$/;

    // Regex para validar email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    // Regex para validar telefone (números de 8 a 11 dígitos)
    const telefoneRegex = /^[0-9]{8,11}$/;

    // Obter valores dos campos
    const nome = document.getElementById('nome').value;
    const cpf = document.getElementById('cpf').value;
    const email = document.getElementById('email').value;
    const telefone = document.getElementById('num_telefone').value;
    const dtNascimento = document.getElementById('dt_nasc').value;

    // Validar campos com regex
    if (!cpfRegex.test(cpf)) {
        alert('CPF inválido. Informe no formato 000.000.000-00.');
        return false;
    }

    if (!emailRegex.test(email)) {
        alert('Email inválido. Informe um email válido.');
        return false;
    }

    if (!telefoneRegex.test(telefone)) {
        alert('Telefone inválido. Informe um telefone válido com 8 a 11 dígitos.');
        return false;
    }

    // Validar data de nascimento (opcional)
    // Você pode adicionar uma validação específica para a data de nascimento conforme necessário

    return true;
}