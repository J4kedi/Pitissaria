<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/form.css">
    <title>login</title>
</head>
<body>
    <?php include('geral/menu.php');?>

    <div class="form-container">
        <h1>Logar</h1>
        <form action="../PHP/forms/login.php" method="post" class="form">
            <div class="divisao">
                <!-- Email ou Username -->
                <label for="email-username">Email ou Username:</label>
                <input type="text" name="email-username" placeholder="Digite email ou username">
                <!-- Senha -->
                <label for="senha">Senha:</label>
                <input type="password" name="senha" placeholder="Digite sua senha">
            </div>
            <button id="btn-enviar">Logar</button>
        </form>
    </div>

    <?php include('geral/footer.php')?>
</body>
</html>