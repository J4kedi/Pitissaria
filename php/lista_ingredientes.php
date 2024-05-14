<?php

// Incluir o arquivo de conexão com o banco de dados
include("connection.php");
include("../geral/menu.php");


// Consulta SQL para selecionar os ingredientes
$sql =  "SELECT id, nome, preco, data_entrada, data_validade, quantidade FROM ingredientes";
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
        <h3 class="texto_registro">Ingredientes cadastrados: <?php echo $result->num_rows?></h3>
    </div>
    <br><br>

    <div class="add_ingrediente">
        <a href="cadastro_ingredientes.php" class="button-style"> +Adicionar Ingrediente </a>
        <br><br>
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
                    <td class="id_css" onclick="window.location='ingredientes_ingrediente.php?id_ingrediente=<?php echo $row["id"]?>';" style = "cursor: pointer;">
                        <?php echo $row["id"] ?>
                    </td>
                    <td><?php echo $row["nome"] ?></td>
                    <td><?php echo date("d/m/Y", strtotime($row["data_entrada"])) ?></td>
                    <td><?php echo $row["quantidade"] ?></td>
                    <td class="edit_css" style="cursor: pointer;" onclick="window.location='edit_ingredientes.php?id=<?php echo $row['id']?>'">
                        <a class="link" href="edit_ingredientes.php?id=<?php echo $row["id"]?>">Editar</a>
                    </td>
                    <!-- Nessa parte do codigo ele está verificando se o usuairo é o gerente  -->
                    <td class="delet_css"> 
                        <?php if($_SESSION['tp_user'] == 'gerente'): ?>
                            <a class="link" href="delet_ingredientes_php.php?id=<?php echo $row['id']?>">Excluir</a>
                            <!-- logo apos caso ele não seja gerente ele deixa bloqueado o botão de excluir  -->
                        <?php else: ?>
                            <span style="color: gray; cursor: not-allowed;">Excluir</span>
                        <?php endif; ?>
                    </td>
                </tr>
        <?php
            }
        } else {
            echo " Não há registro de ingredientes";
        }
        ?>

    </table>

    <?php include("../geral/footer.php")?>
</body>

</html>
