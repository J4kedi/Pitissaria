<?php
require_once('../PHP/conexao/connection.php');

$id = $_SESSION['sessao'];

$sql = "SELECT u.nome, u.email, u.cpf, u.data_nascimento, u.celular, u.username, e.id, e.cep, e.rua, e.num_res, e.cidade, e.estado FROM usuarios u INNER JOIN usuario_endereco ue ON u.id = ue.usuario_id INNER JOIN enderecos e ON ue.endereco_id = e.id WHERE u.id = :id";
$stmt = $conn->prepare($sql);
$stmt->execute([':id' => $id]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Salvado as consultas, para poder mostrar na página de perfil
$nome = $result['nome'];
$email = $result['email'];
$cpf = $result['cpf'];
$dataNascimento = $result['data_nascimento'];
$celular = $result['celular'];
$username = $result['username'];

// Salvando os endereços para mostrar na página de perfil
$idEndereco = $result['id'];
$cep = $result['cep'];
$rua = $result['rua'];
$numRes = $result['num_res'];
$cidade = $result['cidade'];
$estado = $result['estado'];

do {
    $endereco = $result['rua']. ", ". $result['num_res']. ", ".  $result['cep']. ", ".  $result['cidade']. ", ".  $result['estado'];
    $enderecos[] = $endereco;
} while ($result = $stmt->fetch(PDO::FETCH_ASSOC));

function exibirEnderecos($enderecos) {
    if (count($enderecos) > 0) {
        $value = 0;
        foreach ($enderecos as $endereco) {
            echo "<option value='$value'>$endereco</op>";
            $value += 1;
        }

        echo "<option value='novo'>Adicionar novo endereço</op>";

    } else {
        echo "Nenhum endereço encontrado.";
    }
}