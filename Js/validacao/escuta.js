const campoEmail = document.getElementById('email');
const campoUsername = document.getElementById('username');
const campoSenha = document.getElementById('senha');
const campoCpf = document.getElementById('cpf');
const campoDataNasc = document.getElementById('dt_nasc');
const campoTel = document.getElementById('num_telefone');
const campoCep = document.getElementById('cep');
const campoNumRes = document.getElementById('num_res');

campoCpf.addEventListener('input', numero);
campoCpf.addEventListener('blur', cpf);

campoTel.addEventListener('input', numero);
campoCep.addEventListener('input', numero);