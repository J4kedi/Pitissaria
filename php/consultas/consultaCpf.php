<?php
include('../conexao/connection.php');

header('Content-Type: application/json');

try {
    $data = json_decode(file_get_contents('php://input'), true);
    if ($data === null) {
        throw new Exception('Invalid JSON input');
    }

    $cpf = $data['cpf'];

    $sql = "SELECT cpf FROM usuarios WHERE cpf = :cpf";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':cpf' => $cpf]);
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($resultado) {
        $response = [
            'success' => true,
            'message' => 'CPF verificado com sucesso!',
            'existe' => true,
        ];
    } else {
        $response = [
            'success' => true,
            'message' => 'CPF verificado com sucesso!',
            'existe' => false,
        ];
    }

    echo json_encode($response);
} catch (Exception $e) {
    $response = [
        'success' => false,
        'message' => 'Erro ao verificar CPF: ' . $e->getMessage()
    ];
    echo json_encode($response);
}
?>