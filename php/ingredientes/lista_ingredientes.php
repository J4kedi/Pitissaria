<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BANCO DE DADOS INGREDIENTES</title>
    <link rel="stylesheet" href="../../Style/lista_ingredientes.css">

</head>

<body>
    <?php
    include("connection.php");

    $sql =  "SELECT id, nome_ingrediente, dt_validade, quantidade_ingrediente FROM ingredientes";
    $result = $conn->query($sql);
    ?>

    numero de registros <?php echo $result->num_rows ?><br><br>
    <div class="add_ingrediente">
        <a href="cadastro_ingredientes.php"><h3>+ Adicionar Ingrediente</h3></a><br><br>
    </div>
    <br><br>
    
    <table>
        <tr>
            <th>ID</th>
            <th>Ingrediente</th>
            <th>Data de validade</th>
            <th>Quantidade em Kg</th>
            <th colspan="2">Ações</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <tr>
                    <td class="id_css">
                        <a href="ingredientes_ingrediente.php?id=<?php echo $row["id"]?>">
                        <?php echo $row["id"] ?>
                        </a>
                    </td>
                    <td><?php echo $row["nome_ingrediente"] ?></td>
                    <td><?php echo date("d/m/Y", strtotime($row["dt_validade"])) ?></td>
                    <td><?php echo $row["quantidade_ingrediente"] ?></td>
                    <td>
                    <a href="edit_ingredientes.php?id=<?php echo $row["id"]?>">
                        Editar
                    </a>
                    </td>
                    <td>
                    <a href="delet_ingredientes_php.php?id=<?php echo $row['id']?>">Excluir</a>
                    </a>
                    </td>
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
