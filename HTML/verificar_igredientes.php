<?php
include('../php/conexao/connection.php');

$data = json_decode(file_get_contents('php://input'), true);
$ingredientes = $data['ingredientes'];

try {
    $disponibilidade = [];

    foreach ($ingredientes as $ingrediente) {
        $stmt = $pdo->prepare("SELECT quantidade FROM ingredientes WHERE id = :id");
        $stmt->execute(['id' => $ingrediente['id']]);
        $row = $stmt->fetch();
        
        if ($row) {
            $disponibilidade[$ingrediente['id']] = $row['quantidade'] >= $ingrediente['quantidade'];
        } else {
            $disponibilidade[$ingrediente['id']] = false;
        }
    }

    // Enviar resposta JSON
    header('Content-Type: application/json');
    echo json_encode($disponibilidade);

} catch (Exception $e) {
    echo json_encode(['error' => 'Erro ao verificar disponibilidade dos ingredientes: ' . $e->getMessage()]);
}
?>
