<?php
include('../conexao/connection.php');

header('Content-Type: application/json');

try {
    $data = json_decode(file_get_contents('php://input'), true);
    if ($data === null) {
        throw new Exception('Invalid JSON input');
    }

    $email = $data['email'];

    $sql = "SELECT email FROM usuarios WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':email' => $email]);
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($resultado) {
        $response = [
            'success' => true,
            'message' => 'Email verificado com sucesso!',
            'existe' => true,
        ];
    } else {
        $response = [
            'success' => true,
            'message' => 'Email verificado com sucesso!',
            'existe' => false,
        ];
    }

    echo json_encode($response);
} catch (Exception $e) {
    $response = [
        'success' => false,
        'message' => 'Erro ao verificar email: ' . $e->getMessage()
    ];
    echo json_encode($response);
}
?>