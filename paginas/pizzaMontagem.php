<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../Style/padrao.css">
    <title>Montagem de pizzas</title>
</head>
<body>
    <?php include('geral/menu.php')?>

    <main class="container">
        <h1>Monte sua pizza aqui</h1>
        <select name="" id="">
            <option value="1"><img src="../imagens/4pedacos.avif" alt="Pizza Pequena" class="tamanho-img"></option>
        </select>


        <label for="pequena">
            <img src="../imagens/4pedacos.avif" alt="Pizza Pequena" class="tamanho-img"> Pizza Pequena
        </label>
        <input type="radio" name="tamanho" id="pequena" value="25"><br>
        <label for="media">
            <img src="../imagens/6pedacos.png" alt="Pizza Média" class="tamanho-img"> Pizza Média
        </label>
        <input type="radio" name="tamanho" id="media" value="35"><br>
        <label for="grande">
            <img src="../imagens/8pedacos.png" alt="Pizza Grande" class="tamanho-img"> Pizza Grande
        </label>
        <input type="radio" name="tamanho" id="grande" value="69"><br>
        <label for="queijo">Queijo</label>
        <input type="checkbox" name="queijo" id="queijo" data-id="1">
        <input type="number" id="quantidade_queijo" name="quantidade_queijo" min="1" max="10" value="1"><br>
        <label for="tomate">Tomate</label>
        <input type="checkbox" name="tomate" id="tomate" data-id="2">
        <input type="number" id="quantidade_tomate" name="quantidade_tomate" min="1" max="10" value="1"><br>
        
        <button id="calcular-total" class="btn btn-primary">Calcular Total</button>
        <a href="../HTML/login.php" class="btn btn-primary">Finalizar</a>
        <p id="total"></p>
        <p id="mensagem-disponibilidade"></p>
    </main>

    <?php include('geral/footer.php')?>

    <script src="../Js/montagem.js"></script>
</body>
</html>