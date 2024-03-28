<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Ingredientes</title>
</head>
<body>
<?php
    include("connection.php");

    $id = $_GET["id"];
    $sql =  "SELECT  nome_ingrediente, dt_validade, quantidade_ingrediente, preco_compra FROM ingredientes WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows>0){
        while($row = $result->fetch_assoc()){
            $nome_ingrediente = $row["nome_ingrediente"];
            $dt_validade = $row["dt_validade"];
            $quantidade_ingrediente = $row["quantidade_ingrediente"];
            $preco_compra = $row["preco_compra"];
        }
    }
    ?>

    <a href="lista_ingredientes.php"><h2>Voltar a listagem</h2></a>
    <h2>Cadastro de Ingredientes</h2>
    <form action="edit_ingredientes_php.php" id="form1" method="POST">


        <label for="nome">Nome do Ingrediente:</label><br>
        <input type="text" id="nome_ingrediente" name="nome_ingrediente" value="<?php echo $nome_ingrediente?>" required><br><br>

        <label for="validade">Data de Validade:</label><br>
        <input type="date" id="dt_validade" name="dt_validade" value="<?php echo $dt_validade?>" required><br><br>

        <label for="quantidade">Quantidade:</label><br><br>
        <input type="number" id="quantidade_ingrediente" name="quantidade_ingrediente" value="<?php echo $quantidade_ingrediente?>" required><br><br>

        <label for="preco_compra">Preço da compra: </label><br><br>
        <input type="number" id="preco_compra" name="preco_compra" value="<?php echo $preco_compra?>" required><br><br>

        <input type="hidden" name="id" value="<?php echo $id?>" required>
        <input type="submit" value="Atualizar Ingrediente">
    </form>
</body>
</html>
