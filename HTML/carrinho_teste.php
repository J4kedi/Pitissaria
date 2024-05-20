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
    <?php include('../geral/menu.php')?>
    <?php include '../php/connection.php'; ?>
    <?php

        if(!isset($_SESSION['id_user'])) {
            // Se não estiver logado, redirecione-o para a página de login
            header("Location: login.php");
            exit();
        }

        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

        // Consulta SQL para selecionar as pizzas no carrinho do usuário atual
        $id_user = $_SESSION['id_user'];
        $sql = "SELECT pizzas.nome, data_pedido, total, endereco_entrega_id FROM pizzas  INNER JOIN itens_pedido ON pizzas.id = itens_pedido.id_pizza INNER JOIN pedidos ON pedidos.id = itens_pedido.id_pedido WHERE pedidos.id_usuario = $id_user";
        $result = $conn->query($sql);

        // Exibir o carrinho de compras
        if ($result->num_rows > 0) {
            echo "<h1>Seu Carrinho de Compras</h1>";
            echo "<table>
                    <tr>
                        <th>ID da Compra</th>
                        <th>ID do Usuário</th>
                        <th>ID da Pizza</th>
                        <th>Endereco id</th>
                    </tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["nome"] . "</td>
                        <td>" . $row["data_pedido"] . "</td>
                        <td>" . $row["total"] . "</td>
                        <td>" . $row["endereco_entrega_id"] . "</td>
                    </tr>";
            }
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