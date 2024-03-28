<?php
    include("connection.php");

    $nome = $_POST["nome_ingrediente"];
    $validade = $_POST["dt_validade"];
    $quantidade = $_POST["quantidade_ingrediente"];
    $preco_compra = $_POST["preco_compra"];

    $sql = "SELECT * FROM ingredientes WHERE nome_ingrediente = '$nome'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // O produto já existe, exibir uma mensagem de erro
        ?>
        <script>
            window.alert("Produto já cadastrado!!!");
            window.location.href = "lista_ingredientes.php";
        </script>
        <?php
    } else {
        // O produto não existe, inserir no banco de dados
        $sql_insert = "INSERT INTO ingredientes(nome_ingrediente, dt_validade, quantidade_ingrediente, preco_compra) VALUES('$nome', '$validade','$quantidade','$preco_compra')";
        
        if ($conn->query($sql_insert) === TRUE) {
        ?>
            <script>
            window.alert("Produto cadastrado com sucesso!");
            window.location.href = "lista_ingredientes.php";
        </script>
        <?php
            
        } else {
            echo "Erro ao cadastrar o produto: " . $conn->error;
        }
    }
?>
