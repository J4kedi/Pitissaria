<?php
include('../php/conexao/connection.php');

$data = json_decode(file_get_contents('php://input'), true);
$ingredientes = $data['ingredientes'];

try {
    $disponibilidade = [];

    foreach ($ingredientes as $ingrediente) {
        $stmt = $conn->prepare("SELECT quantidade FROM ingredientes WHERE id = :id");
        $stmt->execute(['id' => $ingrediente['id']]);
        $row = $stmt->fetch();
        
        if ($row && $row['quantidade'] - $ingrediente['quantidade'] > 0) {
            $disponibilidade[$ingrediente['id']] = $row['quantidade'] >= $ingrediente['quantidade'];
        } else {
            $disponibilidade[$ingrediente['id']] = false;
        }
    }

    if (count($disponibilidade) != 0) {
        foreach ($ingredientes as $ingrediente) {
            $stmt = $conn->prepare("UPDATE ingredientes SET quantidade WHERE id = :id");
            $stmt->execute([
                'id' => $ingrediente['id'],
                'quantidade' => $row['quantidade'] - $ingrediente['quantidade']
            ]);
            $result = $stmt->fetch();
        }
    }

    header('Content-Type: application/json');
    echo json_encode($disponibilidade);
} catch (Exception $e) {
    echo json_encode(['error' => 'Erro ao verificar disponibilidade dos ingredientes: ' . $e->getMessage()]);
}
?>