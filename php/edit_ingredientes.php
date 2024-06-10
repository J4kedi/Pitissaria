<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../Style/padrao.css">
    <link rel="shortcut icon" href="../imagens/icone/pizza.ico" type="image/x-icon">
    <title>Cadastro de Ingredientes</title>
    <!-- Incluir a biblioteca SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    
    <style>
        .containera {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>
<body>
    <main>
    <?php
    include("connection.php");
                    include("../paginas/geral/menu.php");
                    include("validacao_gerente_pizzaiolo.php");
                    verificarAcesso();
    ?>
        <div class="containera">
            <form action="edit_ingredientes_php.php" id="form1" method="POST" onsubmit="return validarData()">
                <?php

                    $id = $_GET["id"];
                    $sql =  "SELECT  nome, data_entrada, data_validade, quantidade, preco FROM ingredientes WHERE id = $id";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $nome_ingrediente = $row["nome"];
                            $data_entrada = $row["data_entrada"];
                            $data_validade = $row["data_validade"];
                            $quantidade_ingrediente = $row["quantidade"];
                            $preco_compra = $row["preco"];
                        }
                    }
                ?>
                <label for="nome">Nome do Ingrediente:</label><br>
                <input type="text" id="nome_ingrediente" name="nome" value="<?php echo $nome_ingrediente ?>" required><br><br>

                <label for="data_entrada">Data de Entrada:</label><br>
                <input type="date" id="data_entrada" name="data_entrada" value="<?php echo $data_entrada ?>" required><br><br>

                <label for="data_validade">Data de Validade:</label><br>
                <input type="date" id="data_validade" name="data_validade" value="<?php echo $data_validade ?>" required><br><br>

                <label for="quantidade">Quantidade:</label><br>
                <input type="number" id="quantidade_ingrediente" name="quantidade" value="<?php echo $quantidade_ingrediente ?>" required><br><br>

                <label for="preco_compra">Preço da compra: </label><br>
                <input type="number" id="preco_compra" name="preco" value="<?php echo $preco_compra ?>" required><br><br>

                <input type="hidden" name="id" value="<?php echo $id ?>" required>
                <input type="submit" value="Atualizar Ingrediente" id="submit">
            </form>
        </div>
    </main>

    <script>
        function validarData() {
            var dataEntrada = new Date(document.getElementById("data_entrada").value);
            var dataValidade = new Date(document.getElementById("data_validade").value);

            if (dataValidade < dataEntrada) {
                // Substituir o alerta padrão pelo modal SweetAlert
                Swal.fire({
                    icon: 'error',
                    title: 'Erro!',
                    text: 'A data de validade não pode ser anterior à data de entrada.',
                });
                return false; // Impede o envio do formulário
            }

            return true; // Permite o envio do formulário
        }
    </script>
</body>
</html>
