<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Ingredientes</title>
</head>
<body>

    <a href="lista_ingredientes.php"><h2>Voltar a listagem</h2></a>
    <h2>Cadastro de Ingredientes</h2>
    <form action="cadastro_ingredientes_php.php" id="form1" method="POST">

        <label for="nome">Nome do Ingrediente:</label><br>
        <input type="text" id="nome_ingrediente" name="nome_ingrediente" required><br><br>

        <label for="validade">Data de Validade:</label><br>
        <input type="date" id="dt_validade" name="dt_validade" required><br><br>

        <label for="quantidade">Quantidade em KG:</label><br><br>
        <input type="text" id="quantidade_ingrediente" name="quantidade_ingrediente" required oninput="validarNumero(this)">
        <label for="">Kg</label><br><br>

        <label for="preco_compra">Preço da compra: </label><br><br>
        <input type="float" id="preco_compra" name="preco_compra" required oninput="validarNumero(this)><br><br>

        <input type="submit" value="Cadastrar Ingrediente">
    </form>
    
    <script src="../../Js/Js_ingredientes/cadastro_ingredientes.js"></script>
</body>
</html>
