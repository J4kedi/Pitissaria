<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="../Style/index.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../Style/padrao.css">
    <title>Cadastro</title>
    <link rel="shortcut icon" href="../imagens/icone/pizza.ico" type="image/x-icon">
</head>

<body>
    <?php include '../geral/menu.php'?>

    <main class="container">
        <h1>Cadastro</h1>

        <!-- Pills content -->
        <div class="tab-content">
            <div class="tab-pane fade show active" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                <form action="cadastro_php.php" id="form1" method="POST">
                    <div class="form-container">
                        <div class="divisao">
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" id="email" name="email" required class="form-control" maxlength="30"/>
                            </div>
                            
                            <!-- username input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="username">Username</label>
                                <input type="text" id="username" name="username" required class="form-control" maxlength="15"/>
                            </div>

                            <!-- senha input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="senha">Senha</label>
                                <input type="password" id="senha" name="senha" required class="form-control" maxlength="20"/>
                            </div>

                            <!-- Name input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="nome">Nome</label>
                                <input type="text" id="nome" name="nome" required class="form-control" maxlength="30"/>
                            </div>

                            <!-- CPF input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="cpf">CPF</label>
                                <input type="text" id="cpf" name="cpf" required class="form-control" maxlength="11"/>
                            </div>
                            
                            <!-- Data de nascimento input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="dt_nasc">Data de Nascimento</label>
                                <input type="date" id="dt_nasc" name="data de nascimento" required class="form-control"/>
                            </div>
                        </div>
                        <div class="divisao">
                            <!-- Número de telefone input -->
                            <div class="form-outline mb-4">
                                   <label class="form-label" for="num_telefone">Telefone</label>
                                   <input id="num_telefone" required class="form-control"  name="telefone" maxlength="11"/>
                           </div>

                            <!-- CEP input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="cep">CEP</label>
                                <input id="cep" name="cep" required class="form-control" maxlength="8"/>
                            </div>

                            <!-- Nome da rua input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="rua">Rua</label>
                                <input type="text" id="rua" name="rua" required class="form-control" maxlength="40" disabled/>
                            </div>

                            <!-- Nome do estado -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="estado">Estado</label>
                                <input type="text" id="estado" name="estado" required class="form-control" maxlength="3" disabled/>
                            </div>
                        
                            <!-- Nome da cidade  -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="cidade">Cidade</label>
                                <input type="text" id="cidade" name="cidade" required class="form-control" maxlength="25" disabled/>
                            </div>

                            <!-- Número da residência input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="num_res">Número da Residência</label>
                                <input id="num_res" required class="form-control" name="num_res" maxlength="5"/>
                            </div>
                        </div>
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
    <script src="../Js/validacao/erro.js"></script>
    <script src="../Js/validacao/apenasNumeros.js"></script>
    <script src="../Js/validacao/cpf.js"></script>
    <script src="../Js/validacao/cadastro.js"></script>
    <script src="../Js/validacao/viaCep.js"></script>
    <script src="../Js/validacao/escuta.js"></script>
    <?php include '../geral/footer.php'?>
</body>
</html>