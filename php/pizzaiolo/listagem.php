<?php

// Incluir o arquivo de conexão com o banco de dados
include("../connection.php");
include("../validacao_acesso_php.php");
verificar_acesso_gerente();
verificarAcessoGerente();

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
        <a href="../../HTML/index.php"><h3>Inicio</h3></a>
    </div>
    <br><br>
    <div class="num_registro">
        <h3 class="texto_registro">Pizzaiolos: <?php echo $result->num_rows ?></h3>
    </div>
    <br><br>
    <div class="add_ingrediente" style="cursor: pointer;" onclick="window.location='cadastro.php'">
        <a href="cadastro.php"><h3 class="add_ingrediente">+ Adicionar Pizzaiolo</h3></a><br><br>
    </div>
    <br><br>
    
    <table>
        <tr class="opcao_css">
            <th>ID</th>
            <th>Nome</th>
            <th>Username</th>
            <th>CPF</th>
            <th>Email</th>
            <th>Senha</th>
            <th>Estado</th>
            <th>CEP</th>
            <th>Data de Nascimento</th>
            <th>Numero Telefone</th>
            <th>Cidade</th>
            <th>Rua</th>
            <th colspan="2">Ações</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>  
                <tr>
                    <td class="id_css" onclick="window.location='ingredientes_ingrediente.php?id_ingrediente=<?php echo $row["id_ingrediente"]?>';" style = "cursor: pointer;">
                        <?php echo $row["id_ingrediente"] ?>
                    </td>
                    <td><?php echo $row["nome_ingrediente"] ?></td>
                    <td><?php echo date("d/m/Y", strtotime($row["dt_validade"])) ?></td>
                    <td><?php echo $row["quantidade_ingrediente"] ?></td>
                    <td class="edit_css"  style="cursor: pointer;" onclick="window.location='edit_ingredientes.php?id=<?php echo $row['id_ingrediente']?>'">
                        <a href="edit_ingredientes.php?id=<?php echo $row["id_ingrediente"]?>">Editar</a>
                    </td>
                    <td class="delet_css" style="cursor: pointer;" onclick="window.location='delet_ingredientes_php.php?id=<?php echo $row['id_ingrediente']?>'">
                        <a href="delet_ingredientes_php.php?id=<?php echo $row['id_ingrediente']?>">Excluir</a>
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
