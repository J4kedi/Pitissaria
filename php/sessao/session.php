<?php 
    session_start();

    if (isset($_SESSION['sessao'])) {
        if ($_SESSION['tipo_usuario'] == 'gerente') {
            echo '<a href = "../php/listagem.php" class="nav-item">Cadastro de Pizzaiolo</a>';
            echo '<a href="../php/lista_ingredientes.php" class="nav-item">ingredientes</a>';
        }
        echo "<div class='logar'>
        <a class='barra'>". $_SESSION['tipo_usuario'] ." </a>
        <a href='perfil.php' class='nav-item'>perfil: " . $_SESSION['username'] . "</a>
        <a class='nav-item' href='../HTML/carrinho_teste.php'>carrinho</a>
                <a href='../PHP/logout.php' class='nav-item'>logout</a>
                </div>
        ";
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