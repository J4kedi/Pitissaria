<?php

// Incluir o arquivo de conexão com o banco de dados
include("connection.php");
include("../paginas/geral/menu.php");
include("validacao_gerente_pizzaiolo.php");
verificarAcesso();

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="shortcut icon" href="../imagens/icone/pizza.ico" type="image/x-icon">
</head>

<body>
    <div class="num_registro">
        <h3 class="texto_registro">Ingredientes cadastrados: <?php echo $result->num_rows?></h3>
    </div>
    <br><br>

    <div class="add_ingrediente">
        <a href="cadastro_ingredientes.php" class="button-style add-link"> +Adicionar Ingrediente </a>
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
                    <td class="id_css" onclick="window.location='ingredientes_ingrediente.php?id=<?php echo $row['id']?>';" style="cursor: pointer;">
                        <?php echo $row["id"] ?>
                    </td>
                    <td><?php echo $row["nome"] ?></td>
                    <td><?php echo date("d/m/Y", strtotime($row["data_entrada"])) ?></td>
                    <td><?php echo $row["quantidade"] ?></td>
                    <td class="edit_css" style="cursor: pointer;">
                        <a class="link edit-link" href="edit_ingredientes.php?id=<?php echo $row["id"]?>">Editar</a>
                    </td>
                    <td class="delet_css" style="cursor: pointer;">
                        <a class="link delete-link" href="delet_ingredientes_php.php?id=<?php echo $row['id']?>">Excluir</a>
                    </td>
                </tr>
        <?php
            }
        } else {
            echo " Não há registro de ingredientes";
        }
        ?>

    </table>

    <?php include("../paginas/geral/footer.php")?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var addLink = document.querySelector('.add-link');
            var editLinks = document.querySelectorAll('.edit-link');
            var deleteLinks = document.querySelectorAll('.delete-link');
            
            addLink.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent the default link behavior
                var url = this.href;
                
                Swal.fire({
                    title: 'Adicionar Ingrediente',
                    text: "Você deseja adicionar um novo ingrediente?",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim, adicionar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            });

            editLinks.forEach(function(link) {
                link.addEventListener('click', function(event) {
                    event.preventDefault(); // Prevent the default link behavior
                    var url = this.href;
                    
                    Swal.fire({
                        title: 'Editar Ingrediente',
                        text: "Você deseja editar este ingrediente?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sim, editar!',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = url;
                        }
                    });
                });
            });

            deleteLinks.forEach(function(link) {
                link.addEventListener('click', function(event) {
                    event.preventDefault(); // Prevent the default link behavior
                    var url = this.href;
                    
                    Swal.fire({
                        title: 'Tem certeza?',
                        text: "Você não poderá reverter esta ação!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sim, excluir!',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = url;
                        }
                    });
                });
            });
        });
    </script>

</body>

</html>
