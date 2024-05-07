<?php

// Incluir o arquivo de conexão com o banco de dados
include("connection.php");
include("../geral/menu.php");

// Consulta SQL para selecionar os ingredientes
$sql =  "SELECT id_user, nome, tp_user, username, dt_nasc, cpf, email, senha, dt_nasc, num_telefone, estado, cep, cidade, rua FROM user_endereco_user WHERE tp_user = 'pizzaiolo'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="Pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingredientes</title>
    <link rel="stylesheet" href="../Style/lista_ingredientes.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../Style/padrao.css">  
    <link rel="shortcut icon" href="../imagens/icone/pizza.ico" type="image/x-icon">
</head>

<body>
    <div class="num_registro">
        <h3 class="texto_registro">Pizzaiolos: <?php echo $result->num_rows ?></h3>
    </div>
    <br><br>
    <div class="add_ingrediente" style="cursor: pointer;" onclick="window.location='cadastro.php'">
        <a href="cadastro.php" class="button-style">+ Adicionar Pizzaiolo</a>
        <br><br>
    </div>
    <br><br>
    
    <table>
        <tr class="opcao_css">

            <th>ID</th>
            <th>Nome</th>
            <th>Tipo de Usuario</th>
            <th>Username</th>
            <th>CPF</th>
            <th>Telefone</th>
            <th>Data de Nascimento</th>

            <th colspan="2">Ações</th>
            
        </tr>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>  
                <tr>
                    <td class="id_css" onclick="window.location='lista.php?id_user=<?php echo $row["id_user"]?>';" style = "cursor: pointer;">
                        <?php echo $row["id_user"] ?>
                    </td>
                    <td><?php echo $row["nome"] ?></td>

                    <td><?php echo $row["tp_user"]?></td>

                    <td><?php echo $row["username"] ?></td>

                    <td><?php echo $row["cpf"] ?></td>

                    <td><?php echo $row["num_telefone"] ?></td>

                    <td><?php echo date("d/m/Y", strtotime($row["dt_nasc"])) ?></td>

                    <td class="edit_css"  style="cursor: pointer;" onclick="window.location='edit.php?id=<?php echo $row['id_user']?>'">
                        <a class="link" href="edit.php?id=<?php echo $row["id_user"]?>">Editar</a>
                    </td>
                    <td class="delet_css" style="cursor: pointer;" onclick="window.location='delete.php?id=<?php echo $row['id_user']?>'">
                        <a class="link" href="delete.php?id=<?php echo $row['id_user']?>">Excluir</a>
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
