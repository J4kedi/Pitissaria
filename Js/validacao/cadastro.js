function validarCampo(idCampo) {
    const campo = document.getElementById(idCampo);
    const valor = campo.value.trim(); // Remover espaços em branco do início e do fim

    console.log("passou")
    
    // Adicione a lógica de validação específica para cada campo conforme necessário
    switch (idCampo) {
        case 'cpf':
            console.log("passou")
            verifcaCpf(campo, valor)
            break;
            // Adicione mais cases para outros campos que precisam de validação em tempo real
    }
}


function verifcaCpf(campo, valor) {
    const cpfRegex = /^[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}$/;
    if (!cpfRegex.test(valor)) {
        campo.setCustomValidity('CPF inválido. Informe no formato 000.000.000-00.');
        console.log("passou")
    } else {
        campo.setCustomValidity('');
    }
}