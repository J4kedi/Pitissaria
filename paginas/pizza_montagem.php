<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/checkbox.css">
    <title>Montagem da Pizza</title>
    <script src="teste_script.js"></script>

</head>
<body>
    <?php include("geral/menu.php")?>

    <?php 
        include("../php/consultas/consultaDadosIngredientes.php");
    ?>

    <main class="container">
        <h1>Monte sua Pizza aqui</h1>

        <div class="container-checkbox container-pizza" id="tamanhos">
            <div class="card">
                <img class="img-pizza" src="../imagens/4pedacos.avif" alt="pizza-pequena">
                <label for="checkbox-1">
                    <input type="checkbox" id="checkbox-1" name="checkbox-1" value="25.99" max='1' min='1' max-length="1" checked>
                    <p>Pequena</p>
                </label>
            </div>
            <div class="card">
                <img class="img-pizza" src="../imagens/6pedacos.png" alt="pizza-média">
                <label for="checkbox-2">
                    <input type="checkbox" id="checkbox-2" name="checkbox-2" value="35.99" max='1' min='1' max-length="1">
                    <p>Média</p>
                </label>
            </div>
            <div class="card">
                <img class="img-pizza" src="../imagens/8pedacos.png" alt="pizza-grande">
                <label for="checkbox-3">
                    <input type="checkbox" id="checkbox-3" name="checkbox-3" value="69.99" max='1' min='1' max-length="1">
                    <p>Grande</p>
                </label>
            </div>
        </div>

        <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Seleciona todos os checkboxes dentro do container com id "tamanhos"
        const checkboxes = document.querySelectorAll("#tamanhos input[type='checkbox']");

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener("change", function() {
                // Desmarcar todos os outros checkboxes quando um for marcado
                checkboxes.forEach(item => {
                    if (item !== this) {
                        item.checked = false;
                    }
                });
            });
        });
    });
</script>


        <div class="container-checkbox container-ingredientes">
            <?php exibirIngredientes();?>
        </div>
        
        <div class="botoes card">
            <div class="card preco2">
                <button type="submit" id="add">Adicionar</button>
                <p>Total de pizzas: 0</p>
            </div>
            <div class="card preco">
                <button type="submit" id="finalizar" >Finalizar</button>
                <p>Valor total: R$</p>
            </div>
        </div>
    </main>

    <?php include("geral/footer.php")?>
    <script src="../Js/paginas/enviarIngredientes.js"></script>
    <script src="../Js/paginas/calcularTotal.js"></script>
    <script src="../Js/paginas/enviarPizzas.js"></script>
    <script src="../Js/paginas/montagem.js"></script>
</body>
</html>