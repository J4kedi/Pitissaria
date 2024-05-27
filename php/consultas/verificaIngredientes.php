<?php
include('../conexao/connection.php');

try {
    $data = json_decode(file_get_contents('php://input'), true);
    if ($data === null) {
        throw new Exception('Invalid JSON input');
    }

    $ingredientes = $data['ingredientes'];
    $disponibilidade = [];

    foreach ($ingredientes as $id => $ingrediente) {
        $stmt = $conn->prepare("SELECT quantidade FROM ingredientes WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row && $row['quantidade'] >= $ingrediente['quantidade']) {
            $disponibilidade[$id] = true;
        } else {
            $disponibilidade[$id] = false;
        }
    }

    if (count($disponibilidade) > 0) {
        foreach ($ingredientes as $id => $ingrediente) {
            $stmt = $conn->prepare("UPDATE ingredientes SET quantidade = quantidade - :quantidade WHERE id = :id");
            $stmt->execute([
                ':id' => $id,
                ':quantidade' => $ingrediente['quantidade']
            ]);
        }
    }

    header('Content-Type: application/json');
    echo json_encode($disponibilidade);
} catch (Exception $e) {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Erro ao verificar disponibilidade dos ingredientes: ' . $e->getMessage()]);
}
?>
