<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../Style/padrao.css">
    <title>Montagem de pizzas</title>
</head>
<body>
    <?php include('../geral/menu.php')?>

    <main class="container">
        <h1>Monte sua pizza aqui</h1>
        <label for="Pequena">Pizza Pequena</label>
        <input type="radio" name="tamanho" id="pequena"><br>
        <label for="Pequena">Pizza Média</label>
        <input type="radio" name="tamanho" id="media"><br>
        <label for="Pequena">Pizza Grande</label>
        <input type="radio" name="tamanho" id="grande"><br>
        <label for="queijo">Queijo</label>
        <input type="checkbox" name="Queijo" id="queijo"><br>
        <label for="tomate">Tomate</label>
        <input type="checkbox" name="tomate" id="tomate">
    </main>


    <?php include('../geral/footer.php')?>
</body>
</html>
