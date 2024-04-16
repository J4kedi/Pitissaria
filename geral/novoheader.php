<header>
    <link rel="stylesheet" href="../Style/header.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="menu">
      <nav>
        <a href="index.php"><img id="logo-inicio" src="../ASSETS/logo-inicio (1).png" alt="Logo Pitissasria"></a>
        <a href="index.php" class="links lover">inicio</a>
        <div class="autenticacao">
            <?php
                session_start(); // Inicia a sessão
                // Verifica se a variável de sessão tp_user está definida
                if(isset($_SESSION['tp_user'])) {
                    // Se o usuário for um gerente, exibe o link de ingredientes
                    if($_SESSION['tp_user'] === 'gerente' || $_SESSION['tp_user']==='pizzaiolo') {
                        echo '<a href="../php/ingredientes/lista_ingredientes.php" class="links lover">ingredientes</a>';
                        echo '<a href="logout.php" class="links lover">logout</a>';
                        echo '<a class="links">gerente | pizzaiolo</a>';
                    }
                    // Se o usuário for um cliente, exibe os links de login e cadastro
                    else if($_SESSION['tp_user'] === 'cliente') {
                        echo '<a class="links lover" href="logout.php">logout</a>';
                        echo '<a class="links">cliente</a>';
                    }
                } else {
                    // Se a variável de sessão tp_user não estiver definida, exibe apenas o link de login
                    echo '<a class="links lover" href="../HTML/login.php">login</a>';
                    echo '<a class="links lover" href="../HTML/cadastro.php">cadastro</a>';
                }
            ?>
        </div>
      </nav>
    </div>
    <section class="menu-image">
        <div class="content">
          <hgroup>
            <img class="logo" src="../ASSETS/logo-inicio (1).png" alt="Logo Pitissasria">
            <i>A pizza do seu jeito</i>
          </hgroup>
        </div>
        <div class="overlay"></div>
    </section>
    <script src="../js/geral/header.js"></script>
</header>