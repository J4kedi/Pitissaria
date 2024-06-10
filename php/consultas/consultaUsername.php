<?php
include('../conexao/connection.php');

header('Content-Type: application/json');

try {
    $data = json_decode(file_get_contents('php://input'), true);
    if ($data === null) {
        throw new Exception('Invalid JSON input');
    }

    $username = $data['username'];

    $sql = "SELECT username FROM usuarios WHERE username = :username";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':username' => $username]);
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($resultado) {
        $response = [
            'success' => true,
            'message' => 'Username verificado com sucesso!',
            'existe' => true,
        ];
    } else {
        $response = [
            'success' => true,
            'message' => 'Username verificado com sucesso!',
            'existe' => false,
        ];
    }

    echo json_encode($response);
} catch (Exception $e) {
    $response = [
        'success' => false,
        'message' => 'Erro ao verificar username: ' . $e->getMessage()
    ];
    echo json_encode($response);
}
?>