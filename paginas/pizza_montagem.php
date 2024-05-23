<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/checkbox.css">
    <title>Montagem da Pizza</title>
</head>
<body>
    <?php include("geral/menu.php")?>

    <main class="container">
        <h1>Monte sua Pizza aqui</h1>

        <div class="container-checkbox">
            <div class="card">
                <img class="img-pizza" src="../imagens/4pedacos.avif" alt="pizza-pequena">
                <label for="checkbox-1">
                    <input type="checkbox" id="checkbox-1" name="checkbox-1" max-length="1">
                    <p>Pequena</p>
                </label>
            </div>
            <div class="card">
                <img class="img-pizza" src="../imagens/6pedacos.png" alt="pizza-média">
                <label for="checkbox-2">
                    <input type="checkbox" id="checkbox-2" name="checkbox-2" max-length="1">
                    <p>Média</p>
                </label>
            </div>
            <div class="card">
                <img class="img-pizza" src="../imagens/8pedacos.png" alt="pizza-grande">
                <label for="checkbox-3">
                    <input type="checkbox" id="checkbox-3" name="checkbox-3" max-length="1">
                    <p>Grande</p>
                </label>
            </div>
        </div>

        <div class="container-checkbox">
            <div class="card">
                <label for="checkbox-4">
                    <input type="checkbox" id="checkbox-4" name="checkbox-4" max-length="1"/>
                    <p>Queijo</p>
                </label>
                <input type="text" class="input-checkbox" name="quantidade">
                <p class="checkbox-p">qtd.</p>
            </div>
            <div class="card">
                <label for="checkbox-5">
                    <input type="checkbox" id="checkbox-5" name="checkbox-5" max-length="1"/>
                    <p>Tomate</p>
                </label>
                <input type="text" class="input-checkbox" name="quantidade">
                <p class="checkbox-p">qtd.</p>
            </div>
            <div class="card">
                <label for="checkbox-6">
                    <input type="checkbox" id="checkbox-6" name="checkbox-6" max-length="1"/>
                    <p>Calabresa</p>
                </label>
                <input type="text" class="input-checkbox" name="quantidade">
                <p class="checkbox-p">qtd.</p>
            </div>
            <div class="card">
                <label for="checkbox-6">
                    <input type="checkbox" id="checkbox-6" name="checkbox-6" max-length="1"/>
                    <p>Pepperoni</p>
                </label>
                <input type="text" class="input-checkbox" name="quantidade">
                <p class="checkbox-p">qtd.</p>
            </div>
            <div class="card">
                <label for="checkbox-6">
                    <input type="checkbox" id="checkbox-6" name="checkbox-6" max-length="1"/>
                    <p>Azeitona</p>
                </label>
                <input type="text" class="input-checkbox" name="quantidade">
                <p class="checkbox-p">qtd.</p>
            </div>
            <div class="card" style="margin: 20px;">
                <button type="submit" style="width: 100px; height: 40px;">Finalizar</button>
                <p style="align-self: center; margin: 10px;">calcular total R$ 0,00</p>
            </div>
        </div>

    </main>

    <?php include("geral/footer.php")?>
    <script src="../Js/novaValidacao/erro.js"></script>
    <script src="../Js/novaValidacao/escuta.js"></script>
    <script src="../Js/paginas/montagem.js"></script>
</body>
</html>