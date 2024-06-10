<?php 
    include('../php/connection.php');
    include("../paginas/geral/menu.php");
    include("../php/validacao_gerente_pizzaiolo.php");
    verificarAcesso();

    $sql = "SELECT pedidos.id, pedidos.id_usuario, usuarios.nome AS nome_usuario, pedidos.data_pedido, pedidos.total, pedidos.endereco_entrega_id, pedidos.status_pedido, pizzas.nome AS nome_pizza
            FROM pedidos
            JOIN usuarios ON pedidos.id_usuario = usuarios.id
            LEFT JOIN itens_pedido ON pedidos.id = itens_pedido.id_pedido
            LEFT JOIN pizzas ON itens_pedido.id_pizza = pizzas.id";
    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="Pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
    <link rel="stylesheet" href="../Style/lista_ingredientes.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../Style/padrao.css">
    <link rel="shortcut icon" href="../imagens/icone/pizza.ico" type="image/x-icon">
    <link rel="stylesheet" href="../Style/pedidos_pizzaiolo.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

<div class="table-container">
    <table>
        <tr>
            <th>Nome cliente</th>
            <th>Nome da Pizza</th>
            <th>Data do Pedido</th>
            <th>Total</th>
            <th>Status do Pedido</th>
            <th>Ações</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
            <tr>
                <td><?php echo $row["nome_usuario"] ?></td>
                <td><?php echo $row["nome_pizza"] ?></td>
                <td><?php echo date("d/m/Y", strtotime($row["data_pedido"])) ?></td>
                <td><?php echo $row["total"] ?></td>
                <td>
                    <select class="status-dropdown" data-id="<?php echo $row["id"]; ?>">
                        <option value="Recebido" <?php echo $row["status_pedido"] == "Recebido" ? 'selected' : ''; ?>>Recebido</option>
                        <option value="Preparando" <?php echo $row["status_pedido"] == "Preparando" ? 'selected' : ''; ?>>Preparando</option>
                        <option value="Finalizado" <?php echo $row["status_pedido"] == "Finalizado" ? 'selected' : ''; ?>>Finalizado</option>
                    </select>
                </td>
                <td>
                    <button class="delete-btn" data-id="<?php echo $row['id']; ?>">Excluir</button>
                </td>
            </tr>
        <?php
            }
        } else {
            echo "Nenhum pedido encontrado.";
        }
        ?>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.status-dropdown').change(function() {
            var status = $(this).val();
            var id = $(this).data('id');

            $.ajax({
                url: 'atualizar_status.php',
                type: 'POST',
                data: { id: id, status: status },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Status atualizado com sucesso!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro ao atualizar status.',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
        });

        $('.delete-btn').click(function() {
            var id = $(this).data('id');

            if(confirm('Tem certeza que deseja excluir este pedido?')) {
                $.ajax({
                    url: 'excluir_pedido.php',
                    type: 'POST',
                    data: { id: id },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Pedido excluído com sucesso!',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        location.reload();
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Erro ao excluir pedido.',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                });
            }
        });
    });
</script>

</body>
</html>
