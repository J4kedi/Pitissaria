<?php 
function exibirCarrinho() {
    require_once('../php/conexao/connection.php');
    
    $id = $_SESSION['sessao'];

    $sql = "SELECT pizzas.nome, data_pedido, total, endereco_entrega_id, usuarios.nome AS nome_usuario,
    (SELECT SUM(total) FROM pedidos) AS total_pedidos FROM pizzas
    INNER JOIN itens_pedido ON pizzas.id = itens_pedido.id_pizza
    INNER JOIN pedidos ON pedidos.id = itens_pedido.id_pedido
    INNER JOIN usuarios ON pedidos.id_usuario = usuarios.id
    WHERE pedidos.id_usuario = :id";
    $result = $conn->prepare($sql);
    $result->bindParam(':id', $id, PDO::PARAM_INT);
    $result->execute();

    if ($result->rowCount() > 0) {
        echo "<h1>Seu Carrinho de Compras</h1>";
        echo "<table>
                <tr>
                    <th>Nome da pizza</th>
                    <th>Data da compra</th>
                    <th>Nome do usuário</th>
                    <th>Preço</th>
                </tr>";

        // Exibir o carrinho de compras
        $total_pedido_total = 0;
        
        while ($row = $result->fetch()) {
            echo "<tr>
                    <td>" . $row["nome"] . "</td>
                    <td>" . $row["data_pedido"] . "</td>
                    <td>" . $row["nome_usuario"] . "</td>
                    <td>" . $row["total"] . "</td>
                </tr>";

            // Adiciona o total do pedido atual à soma total
            $total_pedido_total += $row["total"];
        }

        echo "</table>";
        echo "<br>";
        echo "<tr>
                <td colspan='2'></td>
                <td><strong>Total:</strong></td>
                <td>" . $total_pedido_total . "</td>
            </tr>";
        echo "</table>";
    } else {
        echo "Seu carrinho está vazio.";
    }
}
?>