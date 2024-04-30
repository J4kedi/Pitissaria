<?php


// Verificar se o usuário está logado e é um gerente
function verificar_acesso_gerente() {
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
        // Verifica se é gerente
        if($_SESSION['tp_user'] === 'gerente') {
            return true;
        }
    }
    return false;
}

// Verificar se o usuário está logado e é um pizzaiolo
function verificar_acesso_pizzaiolo() {
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
        // Verifica se é pizzaiolo
        if($_SESSION['tp_user'] === 'pizzaiolo') {
            return true;
        }
    }
    return false;
}


function verificarAcessoGerente() {
    if($_SESSION['tp_user'] != 'gerente') {
        header("Location: ../../HTML/index.php");
        exit();
    }
}

function verificarAcessoGerenteEPizzaiolo() {
    if($_SESSION['tp_user'] != 'gerente' && $_SESSION['tp_user'] != 'pizzaiolo') {
        header("Location: ../../HTML/index.php");
        exit();
    }
}
?>
