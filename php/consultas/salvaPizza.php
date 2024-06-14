<?php 
include('../conexao/connection.php');

session_start();

header('Content-Type: application/json');

try {
    $data = json_decode(file_get_contents('php://input'), true);
    if ($data === null) {
        throw new Exception('Invalid JSON input');
    }

    $nome = "Pizza personalizada";
    $tamanho = $data['tamanho'];
    $descricao = "Personalizada";
    $preco = $data['total'];
    $id_usuario = $_SESSION['sessao'];

    $ingredientes = $data['ingredientes'];

    $sqlPizza = "INSERT INTO pizzas(nome, tamanho, descricao, preco, id_usuario) VALUES (:nome, :tamanho, :descricao, :preco, :id_usuario)";
    $stmtPizza = $conn->prepare($sqlPizza);
    $resultadoPizza = $stmtPizza->execute([
        ':nome' => $nome,
        ':tamanho' => $tamanho,
        ':descricao' => $descricao,
        ':preco' => $preco,
        ':id_usuario' => $id_usuario,
    ]);

    if(!$resultadoPizza) {
        throw new Exception('Pizza inválida!');
    }

    $id_pizza = $conn->lastInsertId();

    foreach ($ingredientes as $id => $ingrediente) {
        $sqlIndredientesPizzas = "INSERT INTO ingredientes_pizzas(id_pizza, id_ingrediente, id_usuario, quantidade) VALUES (:id_pizza, :id_ingrediente, :id_usuario, :quantidade)";
        $stmtIndredientesPizzas = $conn->prepare($sqlIndredientesPizzas);
        $resultadoIngredientesPizzas = $stmtIndredientesPizzas->execute([
            ':id_pizza' => $id_pizza,
            ':id_ingrediente' => $id,
            ':id_usuario' => $id_usuario,
            ':quantidade' => $ingrediente['quantidade'],
        ]);

        if(!$resultadoIngredientesPizzas) {
            throw new Exception('Ocorreu um erro em salvar os ingredientes da pizza.');
        }
    }

    $sqlEnderecoUsuario = "SELECT e.id AS endereco_id FROM usuario_endereco ue INNER JOIN enderecos e ON ue.endereco_id = e.id WHERE ue.usuario_id = :id_usuario LIMIT 1";
    $stmtEnderecoUsuario = $conn->prepare($sqlEnderecoUsuario);
    $stmtEnderecoUsuario->execute([':id_usuario' => $id_usuario]);
    $resultadoEnderecoUsuario = $stmtEnderecoUsuario->fetch(PDO::FETCH_ASSOC);

    if(!$resultadoEnderecoUsuario) {
        throw new Exception('Ocorreu um erro em consultar o endereço.');
    }

    $id_endereco = $resultadoEnderecoUsuario['endereco_id'];

    $sqlPedidos = "INSERT INTO pedidos(id_usuario, data_pedido, total, endereco_entrega_id) VALUES (:id_usuario, :data_atual, :preco, :id_endereco)";
    $stmtPedidos = $conn->prepare($sqlPedidos);
    $resultadoPedidos = $stmtPedidos->execute([
        ':id_usuario' => $id_usuario,
        ':data_atual' => date('Y/m/d'),
        ':preco' => $preco,
        ':id_endereco' => $id_endereco,
    ]);

    if(!$resultadoPedidos) {
        throw new Exception("Ocorreu um erro ao criar o pediddo, tente novamente mais tarde!");
    }

    $id_pedido = $conn->lastInsertId();

    $sqlItensPedidos = "INSERT INTO itens_pedido(id_pedido, id_pizza, quantidade, preco_unitario  ) VALUES (:id_pedido, :id_pizza , :quantidade, :preco)";
    $stmtItensPedidos = $conn->prepare($sqlItensPedidos);
    $resultadoItensPedidos = $stmtItensPedidos->execute([
        ':id_pedido' => $id_pedido,
        ':id_pizza' => $id_pizza,
        ':quantidade' => 1,
        ':preco' => $preco, 
    ]);

    if(!$resultadoItensPedidos) {
        throw new Exception("Ocorreu um erro ao adicionar o pediddo ao carrinho, tente novamente mais tarde!");
    }

    $response = [
        'success' => true,
        'message' => 'Pizza salva com sucesso!',
        'data' => [
            'tamanho' => $tamanho,
            'ingredientes' => $ingredientes,
        ]
    ];

    echo json_encode($response);
} catch (Exception $e) {
    $response = [
        'success' => false,
        'message' => 'Erro ao salvar pizza: ' . $e->getMessage()
    ];
    echo json_encode($response);
}
?>