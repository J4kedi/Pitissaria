<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../Style/index.css">
    <link rel="stylesheet" href="../Style/padrao.css">

    <title>Document</title>
</head>
<body>
    <?php
    include('../paginas/geral/menu.php');   
    include ('../php/connection.php');

    if (!isset($_SESSION['sessao'])) {
        // Se não estiver logado, redirecione-o para a página de login
        header("Location: ../paginas/login.php");
        exit();
    }

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Consulta SQL para selecionar as pizzas no carrinho do usuário atual
    $id_user = $_SESSION['sessao'];
    $sql = "SELECT pizzas.nome, data_pedido, total, endereco_entrega_id, usuarios.nome AS nome_usuario,
        (SELECT SUM(total) FROM pedidos) AS total_pedidos FROM pizzas
        INNER JOIN itens_pedido ON pizzas.id = itens_pedido.id_pizza
        INNER JOIN pedidos ON pedidos.id = itens_pedido.id_pedido
        INNER JOIN usuarios ON pedidos.id_usuario = usuarios.id
        WHERE pedidos.id_usuario = $id_user";

    $result = $conn->query($sql);

    // Exibir o carrinho de compras
    $total_pedido_total = 0;

    if ($result->num_rows > 0) {
        echo "<h1>Seu Carrinho de Compras</h1>";
        echo "<table>
                <tr>
                    <th>Nome da pizza</th>
                    <th>Data da compra</th>
                    <th>Nome do usuário</th>
                    <th>Preço</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
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

    // Fechar conexão com o banco de dados
    $conn->close();
    ?>
</main>

<?php include('../geral/footer.php')?>

</body>
</html>
