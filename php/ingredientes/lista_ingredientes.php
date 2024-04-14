<?php


// Incluir o arquivo de conexão com o banco de dados
include("../connection.php");
include("validacao_acesso_php.php");
validar_acesso();

// Consulta SQL para selecionar os ingredientes
$sql =  "SELECT id_ingrediente, nome_ingrediente, dt_validade, quantidade_ingrediente FROM ingrediente";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="Pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingredientes</title>
    <link rel="stylesheet" href="../../Style/lista_ingredientes.css">
    <link rel="shortcut icon" href="../../imagens/icone/pizza.ico" type="image/x-icon">
</head>

<body>
    <div class="add_ingrediente">
        <a href="http:../../HTML/index.php"><h3>Inicio</h3></a>
    </div>
    <br><br>
    <div class="num_registro">
        <h3 class="texto_registro">Ingredientes cadastrados: <?php echo $result->num_rows ?></h3>
    </div>
    <br><br>
    <div class="add_ingrediente" style="cursor: pointer;" onclick="window.location='cadastro_ingredientes.php'">
        <a href="cadastro_ingredientes.php"><h3 class="add_ingrediente">+ Adicionar Ingrediente</h3></a><br><br>
    </div>
    <br><br>
    
    <table>
        <tr class="opcao_css">
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
                    <td class="id_css" onclick="window.location='ingredientes_ingrediente.php?id_ingrediente = <?php echo $row["id_ingrediente"]?>';" style = "cursor: pointer;">
                        <?php echo $row["id_ingrediente"] ?>
                    </td>
                    <td><?php echo $row["nome_ingrediente"] ?></td>
                    <td><?php echo date("d/m/Y", strtotime($row["dt_validade"])) ?></td>
                    <td><?php echo $row["quantidade_ingrediente"] ?></td>
                    <td class="edit_css"  style="cursor: pointer;" onclick="window.location='edit_ingredientes?=<?php echo $row['id_ingrediente']?>">
                    <a href="edit_ingredientes.php?id=<?php echo $row["id_ingrediente"]?>">
                        Editar
                    </a>
                    </td>
                    <td class="delet_css" style="cursor: pointer;" onclick="window.location='delet_ingredientes_php?=<?php echo $row['id_ingrediente']?>">
                    <a href="delet_ingredientes_php.php?id=<?php echo $row['id_ingrediente']?>">Excluir</a>
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
