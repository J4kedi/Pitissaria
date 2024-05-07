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
        $sql = "SELECT id_pizza_compra, id_user_endereco_user, id_pizza, status_pizza FROM pizza_compradas WHERE id_user_endereco_user = $id_user";
        $result = $conn->query($sql);

        // Exibir o carrinho de compras
        if ($result->num_rows > 0) {
            echo "<h1>Seu Carrinho de Compras</h1>";
            echo "<table>
                    <tr>
                        <th>ID da Compra</th>
                        <th>ID do Usuário</th>
                        <th>ID da Pizza</th>
                        <th>Status da Pizza</th>
                    </tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id_pizza_compra"] . "</td>
                        <td>" . $row["id_user_endereco_user"] . "</td>
                        <td>" . $row["id_pizza"] . "</td>
                        <td>" . $row["status_pizza"] . "</td>
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