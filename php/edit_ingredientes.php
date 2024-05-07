<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/cad_ingredientes.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../Style/padrao.css">
    <title>Cadastro de Ingredientes</title>
    <link rel="shortcut icon" href="../imagens/icone/pizza.ico" type="image/x-icon">
</head>
<body>
<?php
    include("connection.php");
    include("../geral/menu.php");
    include("validacao_acesso_php.php");
    verificarAcessoGerenteEPizzaiolo();
    
    $id = $_GET["id"];
    $sql =  "SELECT  nome_ingrediente, dt_validade, quantidade_ingrediente, preco_compra FROM ingrediente WHERE id_ingrediente = $id";
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
    <main>
        <div class="containera">
            <h1>Editar Ingredientes</h1>
            <form action="edit_ingredientes_php.php" id="form1" method="POST">
                <label for="nome">Nome do Ingrediente:</label><br>
                <input type="text" id="nome_ingrediente" name="nome_ingrediente" value="<?php echo $nome_ingrediente?>" required><br><br>
    
                <label for="validade">Data de Validade:</label><br>
                <input type="date" id="dt_validade" name="dt_validade" value="<?php echo $dt_validade?>" required><br><br>
    
                <label for="quantidade">Quantidade:</label><br>
                <input type="number" id="quantidade_ingrediente" name="quantidade_ingrediente" value="<?php echo $quantidade_ingrediente?>" required><br><br>
    
                <label for="preco_compra">Preço da compra: </label><br>
                <input type="number" id="preco_compra" name="preco_compra" value="<?php echo $preco_compra?>" required><br><br>
    
                <input type="hidden" name="id" value="<?php echo $id?>" required>
                <input type="submit" value="Atualizar Ingrediente" id = "submit">
            </form>
        </div>
    </main>
    <?php include("../geral/footer.php")?>
</body>
</html>
