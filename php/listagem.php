<?php
    include("connection.php");
    include("../paginas/geral/menu.php");
    require_once("sessao/verificaUsuario.php");
    verificaSessaoPizzaiolo();
    verificaSessaoCliente();

    // Consulta SQL para selecionar os ingredientes
    $sql =  "SELECT u.id, u.nome, u.tipo_usuario, u.email, u.cpf, u.data_nascimento, u.celular, u.username, e.cep, e.rua, e.num_res, e.cidade, e.estado FROM usuarios u INNER JOIN usuario_endereco ue ON u.id = ue.usuario_id INNER JOIN enderecos e ON ue.endereco_id = e.id WHERE tipo_usuario = 'pizzaiolo'";
    $result = $conn ->query($sql);
?>

<!DOCTYPE html>
<html lang="Pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Pizzaiolo</title>
    <link rel="stylesheet" href="../Style/lista_ingredientes.css">
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
                    <td class="id_css" onclick="window.location='lista.php?id=<?php echo $row['id']?>'">
                        <?php echo $row["id"] ?>
                    </td>
                    <td><?php echo $row["nome"] ?></td>

                    <td><?php echo $row["tipo_usuario"]?></td>

                    <td><?php echo $row["username"] ?></td>

                    <td><?php echo $row["cpf"] ?></td>

                    <td><?php echo $row["celular"] ?></td>

                    <td><?php echo date("d/m/Y", strtotime($row["data_nascimento"])) ?></td>

                    <td class="edit_css"  style="cursor: pointer;" onclick="window.location='edit.php?id=<?php echo $row['id']?>'">
                        <a class="link" href="edit.php?id=<?php echo $row["id"]?>">Editar</a>
                    </td>
                    <td class="delet_css" style="cursor: pointer;" onclick="window.location='delete.php?id=<?php echo $row['id']?>'">
                        <a class="link" href="delete.php?id=<?php echo $row['id']?>">Excluir</a>
                    </td>
                </tr>
        <?php
                }
            } else {
                echo " Não há nenhum registro de Pizzaiolo";
            }
        ?>

    </table>
    
    <?php include("../paginas/geral/footer.php")?>

</body>

</html>
