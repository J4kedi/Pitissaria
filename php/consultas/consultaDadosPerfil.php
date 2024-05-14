<?php
    require_once('../PHP/conexao/connection.php');

    $id = $_SESSION['sessao'];

    $sql = "SELECT u.nome, u.email, u.cpf, u.data_nascimento, u.celular, u.username, e.id, e.cep, e.rua, e.num_res, e.cidade, e.estado FROM usuarios u INNER JOIN usuario_endereco ue ON u.id = ue.usuario_id INNER JOIN enderecos e ON ue.endereco_id = e.id WHERE u.id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Salvado as consultas, para poder mostrar na página de perfil
    $nome = $result['nome'];
    $email = $result['email'];
    $cpf = $result['cpf'];
    $dataNascimento = $result['data_nascimento'];
    $celular = $result['celular'];
    $username = $result['username'];
    // Salvado as consultas, para poder mostrar na página de perfil
    $cep = $result['cep'];
    $rua = $result['rua'];
    $numRes = $result['num_res'];
    $cidade = $result['cidade'];
    $estado = $result['estado'];

    $idEndereco = $result['id'];
    $endereco = "$rua, $numRes, $cep, $cidade";

    // Consulta para o endereco do usuario, fazer verificacao de quantos enderecos ele tem
    // $result->num_rows > 0, para verificar o numero de linhas retornadsa, para saber quantos enderecos tem
?>