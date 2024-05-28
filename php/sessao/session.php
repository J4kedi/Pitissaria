<?php 
    session_start();

    if (isset($_SESSION['sessao'])) {
        echo "
            <a href = '../HTML/pizzas_prontas.php' class='nav-item'>cardapio</a>
            <a href = 'pizza_montagem.php' class='nav-item'>personalizado</a>
        ";

        if ($_SESSION['tipo_usuario'] == 'gerente') {
            echo '<a href = "../php/listagem.php" class="nav-item">cadastro pizzaiolo</a>';
            echo '<a href="../php/lista_ingredientes.php" class="nav-item">ingredientes</a>';
            echo "
                <div class='logar'>
                    <a href='perfil.php' class='nav-item'>" . $_SESSION['username'] . "</a>
                    <span class='barra'>/</span>
                    <a href='../PHP/logout.php' class='nav-item'>logout</a>
                </div>
            ";
        }

        if ($_SESSION['tipo_usuario'] == 'cliente') {
            echo "
                <div class='logar'>
                    <a class='nav-item' href='../HTML/carrinho_teste.php'>carrinho</a>
                    <a href='perfil.php' class='nav-item'>" . $_SESSION['username'] . "</a>
                    <span class='barra'>/</span>
                    <a href='../PHP/logout.php' class='nav-item'>logout</a>
                </div>
            ";
        }
    }
    
    else {
        echo "<div class='logar'>
                <a href='login.php' class='nav-item'>login</a> 
                <span class='barra'>/</span> 
                <a href='cadastro.php' class='nav-item'>cadastro</a>
            </div>
        ";
    }  
?>