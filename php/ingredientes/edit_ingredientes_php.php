<?php
    include("connection.php");

    $id = $_POST["id"];
    $nome = $_POST["nome_ingrediente"];
    $validade = $_POST["dt_validade"];
    $quantidade = $_POST["quantidade_ingrediente"];
    $preco_compra = $_POST["preco_compra"];

    $sql = "UPDATE ingredientes SET nome_ingrediente = '$nome', dt_validade = '$validade', quantidade_ingrediente = '$quantidade', preco_compra = '$preco_compra' WHERE id = $id";
    $result =  $conn->query($sql);

    if ($result === TRUE) {
?>
    <script>
        alert("Dados alterados com sucesso");
        location.href = "lista_ingredientes.php";
    </script>
<?php
    }   
    else{
        echo "Erro ao cadastrar ingrediente: " . $conn->error;
    }
?>
