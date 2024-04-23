<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../Style/index.css">
    <link rel="stylesheet" href="../Style/padrao.css">
    <link rel="shortcut icon" href="../imagens/icone/pizza.ico" type="image/x-icon">
    <title>Login</title>
</head>

<body>
    <?php include '../geral/menu.php'?>

    <main class="container">
        <!-- login com  redes diferentes -->
        <div class="tab-content">
            <h1>Login</h1>
            <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                <form action="login_php.php" method="POST">
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="nome" name="nome" class="form-control" />
                        <label class="form-label" for="loginName">Username</label>
                    </div>

                    <!-- senha input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="senha" name="senha" class="form-control" />
                        <label class="form-label" for="loginPassword">Senha</label>
                    </div>

                    <!-- 2 column grid layout -->
                    <div class="row mb-4">
                        <div class="col-md-6 d-flex justify-content-center">
                            <!-- Checkbox para lembrar do usuario -->
                            <div class="form-check mb-3 mb-md-0">
                                <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
                                <label class="form-check-label" for="loginCheck"> Lembre-me </label>
                            </div>
                        </div>

                        <div class="col-md-6 d-flex justify-content-center">
                            <!-- link esqueceu a senha -->
                            <a href="#!">Esqueci minha senha?</a>
                        </div>
                    </div>

                    <!-- botão de login -->
                    <button type="submit" class="btn btn-secondary btn-block mb-4 ">Entrar</button>

                    <!-- Botão de registro -->
                    <div class="text-center">
                        <p>Não e cadastrado? <a href="#!">Cadastrar</a></p>
                    </div>
            </div>
        </div>
        <!-- Pills content -->        
    </main>

    <?php include '../geral/footer.php'?>
</body>
</html>