<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="../Style/style.css">
    <link rel="stylesheet" href="../Style/index.css">
    <link rel="stylesheet" href="../Style/padrao.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <title>Cadastro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="shortcut icon" href="../imagens/icone/pizza.ico" type="image/x-icon">
</head>

<body>
    <?php include '../geral/header.php'?>

    <main class="container">
        <!-- navegação login e cadastro -->
        <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="tab-login" data-mdb-toggle="pill" href="../HTML/login.php" role="tab"
                    aria-controls="pills-login" aria-selected="false">Login</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="tab-register" data-mdb-toggle="pill" href="../HTML/cadastro.php"
                    role="tab" aria-controls="pills-register" aria-selected="true">Cadastrar</a>
            </li>
        </ul>
        <!-- navegação login e cadastro-->

        <!-- Pills content -->
        <div class="tab-content">
            <div class="tab-pane fade" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                <!-- Conteúdo de Login -->
                <!-- Você pode adicionar conteúdo para a página de login aqui, se necessário -->
            </div>
            <div class="tab-pane fade show active" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                <form action="../php/ingredientes/cadastro.php" id="form1" method="POST">
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

                    <!-- Name input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="registerName" class="form-control" />
                        <label class="form-label" for="registerName">Nome</label>
                    </div>

                    <!-- senha input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="registerPassword" class="form-control" />
                        <label class="form-label" for="registerPassword">Senha</label>
                    </div>

                    <!-- CPF input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="registerCPF" class="form-control" />
                        <label class="form-label" for="registerCPF">CPF</label>
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" id="registerEmail" class="form-control" />
                        <label class="form-label" for="registerEmail">Email</label>
                    </div>

                    <!-- Data de nascimento input -->
                    <div class="form-outline mb-4">
                        <input type="date" id="registerDOB" class="form-control" />
                        <label class="form-label" for="registerDOB">Data de Nascimento</label>
                    </div>

                    <!-- Nome da rua input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="registerStreet" class="form-control" />
                        <label class="form-label" for="registerStreet">Nome da Rua</label>
                    </div>

                    <!-- CEP input -->
                    <div class="form-outline mb-4">
                        <input type="number" id="registerCEP" class="form-control" />
                        <label class="form-label" for="registerCEP">CEP</label>
                    </div>

                    <!-- Número da residência input -->
                    <div class="form-outline mb-4">
                        <input type="number" id="registerHouseNumber" class="form-control" />
                        <label class="form-label" for="registerHouseNumber">Número da Residência</label>
                    </div>

                    <!-- Número de telefone input -->
                    <div class="form-outline mb-4">
                        <input type="number" id="registerPhoneNumber" class="form-control" />
                        <label class="form-label" for="registerPhoneNumber">Número de Telefone</label>
                    </div>

                    <!-- Checkbox  de termos -->
                    <div class="form-check d-flex justify-content-center mb-4">
                        <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck" checked
                            aria-describedby="registerCheckHelpText" />
                        <label class="form-check-label" for="registerCheck">
                            Li e concordo com os termos
                        </label>
                    </div>

                    <!-- Enviar button -->
                    <button type="submit" class="btn btn-secondary btn-block mb-3">Cadastrar</button>
                </form>
            </div>
        </div>
        <!-- Pills content -->
    </main>

    <?php include '../geral/footer.php'?>
</body>
</html>