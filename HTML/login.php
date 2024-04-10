<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="../Style/style.css">
    <link rel="stylesheet" href="../Style/index.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="shortcut icon" href="../../imagens/icone/pizza.ico" type="image/x-icon">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md bg-red-900 navbar-warning">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.html">
                    <h2 class="m-0"><img class="d-block" src="../ASSETS/logo-inicio (1).png" width="150" alt="logo">
                    </h2>
                </a>
                <button class="navbar-toggler navbar-warning" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon navbar-warning"></span>
                </button>
                <div class="collapse navbar-collapse navbar-warning" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto navbar-warning">
                        <li class="nav-item">
                            <a class="nav-link" href="../HTML/login.html">LOGIN</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../HTML/cadastro.html">CADASTRO</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-warning" type="submit">Buscar</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>

    <main class="container">
        <!-- Pills navs -->
        <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="../HTML/login.html" role="tab"
                    aria-controls="pills-login" aria-selected="true">Login</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="../HTML/cadastro.html" role="tab"
                    aria-controls="pills-register" aria-selected="false">Cadastrar</a>
            </li>
        </ul>
        <!-- Pills navs -->

        <!-- login com  redes diferentes -->
        <div class="tab-content">
            <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                <form action="login_php.php" method="POST">
                    <div class="text-center mb-3">
                        <p>Entre com:</p>
                        <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-facebook-f"></i>
                        </button>

                        <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-google"></i>
                        </button>

                        <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-twitter"></i>
                        </button>

                        <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-github"></i>
                        </button>
                    </div>

                    <p class="text-center">Ou:</p>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="nome" name="nome" class="form-control" />
                        <label class="form-label" for="loginName">Email Ou username</label>
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
</body>
<footer class="text-center">
    <p>2024 <i class="bi bi-c-circle"></i> Desenvolvido por Tsurubas</p>
</footer>

</html>