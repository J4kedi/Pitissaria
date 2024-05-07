<!DOCTYPE html>
<html>
<head>
    <title>Tabela de Pizza Compradas</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h1>Pizzas em Compras</h1>

<?php

include '../php/connection.php';

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Consulta SQL para selecionar os dados
$sql = "SELECT id_pizza_compra, id_user_endereco_user, id_pizza, status_pizza FROM pizza_compradas";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
    // Exibe os dados em uma tabela HTML
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
    echo "0 resultados";
}

// Fecha a conexão com o banco de dados
$conn->close();
?>

</body>
</html>
