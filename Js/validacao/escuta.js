const formulario = document.getElementById('form1');

const campoEmail = document.getElementById('email');
const campoUsername = document.getElementById('username');
const campoSenha = document.getElementById('senha');
const campoNome = document.getElementById('nome');
const campoCpf = document.getElementById('cpf');
const campoDataNasc = document.getElementById('dt_nasc');
const campoTel = document.getElementById('num_telefone');
const campoCep = document.getElementById('cep');
const campoNumRes = document.getElementById('num_res');
const campoRua = document.getElementById('rua');

formulario.addEventListener('submit', validaCampo);

// valida campo de email
campoEmail.addEventListener('blur', validaCampo);

// valida se o campo não está vazio
campoUsername.addEventListener('blur', validaCampo);
campoNome.addEventListener('blur', validaCampo);

// valida caampo de senha para ver se tem senhaForte
campoSenha.addEventListener('blur', validaCampo);

// adiciona evento de escuta para cada digito 
campoCpf.addEventListener('input', numero);
// lógica para verificar o erro em validar campo
campoCpf.addEventListener('blur', validaCampo);

// adiciona evento de escuta para o campo de data
campoDataNasc.addEventListener('blur', validaCampo);

// adiciona evento de escuta para cada digito
campoTel.addEventListener('input', numero);

// valida se o campo tem mais de 11 dígitos
campoTel.addEventListener('blur', validaCampo)

// adiciona evento de escuta para cada digito
campoCep.addEventListener('input', numero);

// adiciona evento de escuta para pesquisa cep
campoCep.addEventListener('blur', validaCampo);
campoCep.addEventListener('blur', pesquisacep);

// adiciona evento de escuta para cada digito
campoNumRes.addEventListener('input', numero);
campoNumRes.addEventListener('blur', verificaCampoVazio);

campoRua.addEventListener('blur', validaCampo);