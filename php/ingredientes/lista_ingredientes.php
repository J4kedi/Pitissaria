<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BANCO DE DADOS INGREDIENTES</title>
    <style>
        table {
            border: #000 2px solid;
            width: 100%;
            border-collapse: collapse;
        }

        th,
        tr,
        td {
            border: #000 2px solid;
            padding: 8px; /* Adicionando algum espaçamento interno para melhorar a aparência */
        }

        table td {
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    include("../connection.php");

    $sql =  "SELECT id_ingrediente, nome_ingrediente, dt_validade, quantidade_ingrediente FROM ingredientes";
    $result = $conn->query($sql);
    ?>

    numero de registros <?php echo $result->num_rows ?><br><br>
    + Adicionar Ingrediente<br><br>
    <table>
        <tr>
            <th>ID</th>
            <th>Ingrediente</th>
            <th>Data de validade</th>
            <th>Quantidade</th>
            <th colspan="2">Ações</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <tr>
                    <td><?php echo $row["id_ingrediente"] ?></td>
                    <td><?php echo $row["nome_ingrediente"] ?></td>
                    <td><?php echo $row["dt_validade"] ?></td>
                    <td><?php echo $row["quantidade_ingrediente"] ?></td>
                    <td>Editar</td>
                    <td>Excluir</td>
                </tr>
        <?php
            }
        } else {
            echo " Não há registro de ingredientes";
        }
        ?>

    </table>

</body>

</html>
