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
                
                
                <?php
                    session_start(); // Inicia a sessão

                    // Verifica se a variável de sessão tp_user está definida
                    if(isset($_SESSION['tp_user'])) {
                        // Se o usuário for um gerente, exibe o link de ingredientes
                        if($_SESSION['tp_user'] === 'gerente') {
                            echo '<li class="nav-item">';
                            echo '<a class="nav-link" href="../HTML/login.php">LOGIN</a>';
                            echo '</li>';
                            echo '<li class="nav-item">';
                            echo '<a class="nav-link" href="../php/ingredientes/lista_ingredientes.php">INGREDIENTES</a>';
                            echo '</li>';
                            echo '<li class="nav-item">';
                            echo '<a class="nav-link" href="logout.php">LOGOUT</a>';
                            echo '</li>';
                            echo '<li class="nav-item">';
                            echo '</h3 class="nav-link" >Gerente<h3>'; //precisa de CSS
                            echo '</li>';
                            
                        }
                        // Se o usuário for um cliente, exibe os links de login e cadastro
                        else if($_SESSION['tp_user'] === 'cliente') {
                            echo '<li class="nav-item">';
                            echo '<a class="nav-link" href="logout.php">LOGOUT</a>';
                            echo '</li>';
                            echo '<li class="nav-item">';
                            echo '</h3 class="nav-link" >Cliente<h3>'; //precisa de CSS
                            echo '</li>';
                        }
                    } else {
                        // Se a variável de sessão tp_user não estiver definida, exibe apenas o link de login
                        echo '<li class="nav-item">';
                        echo '<a class="nav-link" href="../HTML/login.php">LOGIN</a>';
                        echo '</li>';
                        echo '<li class="nav-item">';
                        echo '<a class="nav-link" href="../HTML/cadastro.php">CADASTRO</a>';
                        echo '</li>';
                    }
                ?>


            </ul>
        </div>
    </div>
    </nav>
</header>    