<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cadastro de Produtos</title>
<script>
    function validarFormulario() {
        var nomeProduto = document.getElementById("nomeProduto").value;
        var produtosCadastrados = []; // Aqui você pode obter essa lista do banco de dados via PHP

        if (produtosCadastrados.includes(nomeProduto.toLowerCase())) {
            alert("Este produto já está cadastrado!");
            return false;
        }
        return true;
    }
</script>
</head>
<body>
    <h2>Cadastro de Produtos</h2>
    <form action="cadastrar_produto.php" method="post" onsubmit="return validarFormulario()">
        <label for="nomeProduto">Nome do Produto:</label>
        <input type="text" id="nomeProduto" name="nomeProduto" required>
        <br>
        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao"></textarea>
        <br>
        <label for="preco">Preço:</label>
        <input type="text" id="preco" name="preco" required>
        <br>
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
