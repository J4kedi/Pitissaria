<header>
    <nav class="navbar navbar-expand-md navbar-warning">
    <div class="container-fluid">
        <a class="navbar-brand" href="../HTML/index.php">
        <h2 class="m-0"><img class="d-block" src="../ASSETS/logo-inicio (1).png" width="150" alt="logo"></h2>
        </a>
        <button class="navbar-toggler navbar-warning" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon navbar-warning"></span>
        </button>
        <div class="collapse navbar-collapse navbar-warning" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto navbar-warning">
                <li class="nav-item">
                    <a class="nav-link" href="../HTML/index.php">INICIO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../HTML/login.php">LOGIN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../HTML/cadastro.php">CADASTRO</a>
                </li>

                
                <?php
                    session_start(); // Inicia a sessão

                    // Verifica se a variável de sessão tp_user está definida e é igual a "gerente"
                    if(isset($_SESSION['tp_user']) && $_SESSION['tp_user'] === 'gerente') {
                        // Se o usuário for um gerente, exibe a tag <li>
                        echo '<li class="nav-item">';
                        echo '<a href="../php/ingredientes/lista_ingredientes.php">Ingredientes</a>';
                        echo '</li>';
                    }
                ?>

            </ul>
        </div>
    </div>
    </nav>
</header>    