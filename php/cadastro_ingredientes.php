<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Ingredientes</title>
</head>
<body>
    <h2>Cadastro de Ingredientes</h2>
    <form action="cadastro_ingredientes_php.php" id="form1" method="POST">
        <label for="nome">Nome do Ingrediente:</label><br>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="validade">Data de Validade:</label><br>
        <input type="date" id="validade" name="validade" required><br><br>

        <label for="quantidade">Quantidade:</label><br><br>
        <input type="number" id="quantidade" name="quantidade" required><br><br>

        <input type="submit" value="Cadastrar Ingrediente">
    </form>
</body>
</html>
