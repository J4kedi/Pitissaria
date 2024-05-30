<?php 
    session_start();
    if (isset($_SESSION['sessao'])) {
        echo "
            <a href = '../paginas/index.php' class='nav-item'>inicio</a>
            <a href = '../paginas/pizza_montagem.php' class='nav-item'>personalizado</a>
            <a href = '../paginas/pizzas_prontas.php' class='nav-item'>Cardapio</a>
            <a href='../PHP/logout.php' class='nav-item'>logout</a>

        ";

        if ($_SESSION['tipo_usuario'] == 'gerente') {

            echo "
                <div class='logar'>
                    <a href = '../php/lista_ingredientes.php' class='nav-item'>Ingredientes</a>
                    <a href = '../HTML/carrinho_teste.php' class='nav-item'>carrinho</a>
                    <a href = '../php/cadastro.php' class = 'nav-item'> Cad. Pizzaiolo</a>
                    <a href='../paginas/perfil.php' class='nav-item'>" . $_SESSION['username'] . "</a>
                    <span class='barra'>/</span>
                    <a href='../PHP/logout.php' class='nav-item'>logout</a>
                </div>
            ";
        }

        if ($_SESSION['tipo_usuario'] == 'cliente') {
            echo "
                <div class='logar'>
                    <a href = '../HTML/carrinho_teste.php' class='nav-item'>carrinho</a>
                    <a href='../paginas/perfil.php' class='nav-item'>" . $_SESSION['username'] . "</a>
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