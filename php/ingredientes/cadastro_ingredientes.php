<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Ingredientes</title>
    <link rel="stylesheet" href="../../Style/cad_ingredientes.css">
</head>
<body>
    <a href="lista_ingredientes.php">Voltar a listagem</a>
    <main>
        <h1>Cadastro de Ingredientes</h1>
        <div class="container">
            <form action="cadastro_ingredientes_php.php" id="form1" method="POST">
                <label for="nome_ingrediente">Nome do Ingrediente:</label><br>
                <input type="text" id="nome_ingrediente" name="nome_ingrediente" required><br><br>

                <label for="dt_validade">Data de Validade:</label><br>
                <input type="date" id="dt_validade" name="dt_validade" required><br><br>

                <label for="quantidade_ingrediente">Quantidade:</label><br>
                <input type="text" id="quantidade_ingrediente" name="quantidade_ingrediente" required oninput="validarNumero(this)" placeholder="Quantidade em KG"><br><br>

                <label for="preco_compra">Preço da compra:</label><br>
                <input type="text" id="preco_compra" name="preco_compra" required oninput="validarNumero(this)"><br><br>

                <button type="submit">Enviar</button>
            </form>
        </div>
    </main>
    <script src="../../Js/Js_ingredientes/cadastro_ingredientes.js"></script>
</body>
</html>
