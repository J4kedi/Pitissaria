const campoEmail = document.getElementById('email');
const campoUsername = document.getElementById('username');
const campoSenha = document.getElementById('senha');
const campoCpf = document.getElementById('cpf');
const campoDataNasc = document.getElementById('dt_nasc');
const campoTel = document.getElementById('num_telefone');
const campoCep = document.getElementById('cep');
const campoNumRes = document.getElementById('num_res');

// valida campo de email
campoEmail.addEventListener('blur', validaCampo);

// valida caampo de senha para ver se tem senhaForte
campoSenha.addEventListener('blur', validaCampo);

// adiciona evento de escuta para cada digito 
campoCpf.addEventListener('input', numero);
// lógica para verificar o erro em validar campo
campoCpf.addEventListener('blur', validaCampo);

// adiciona evenento de escuta para cada digito
campoTel.addEventListener('input', numero);

// adiciona evenento de escuta para cada digito
campoCep.addEventListener('input', numero);

// adiciona evenento de escuta para cada digito
campoNumRes.addEventListener('input', numero);