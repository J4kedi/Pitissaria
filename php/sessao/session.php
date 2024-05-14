<?php 
    session_start();

    if (isset($_SESSION['sessao'])) {
        echo "<div class='logar'>
                <a class='barra'>". $_SESSION['tipo_usuario'] ." </a>
                <a href='perfil.php' class='nav-item'>perfil: Olá, " . $_SESSION['primeiro_nome'] . "!</a>
                <a href='../PHP/logout.php' class='nav-item'>logout</a>
            </div>
        ";
    } else {
        echo "<div class='logar'>
                <a href='login.php' class='nav-item'>login</a> 
                <span class='barra'>/</span> 
                <a href='cadastro.php' class='nav-item'>cadastro</a>
            </div>
        ";
    }  
?>