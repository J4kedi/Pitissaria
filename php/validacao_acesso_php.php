<?php

// Iniciar a sessão (se ainda não estiver iniciada)

// Verificar se o usuário está logado e é um gerente
function verificar_acesso_gerente() {
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && isset($_SESSION['tp_user']) && $_SESSION['tp_user'] === 'gerente') {
        return true;
    }
    return false;
}

// Verificar se o usuário está logado e é um pizzaiolo
function verificar_acesso_pizzaiolo() {
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && isset($_SESSION['tp_user']) && $_SESSION['tp_user'] === 'pizzaiolo') {
        return true;
    }
    return false;
}

// Verificar se o usuário está logado e é um gerente ou pizzaiolo
function verificar_acesso_gerente_pizzaiolo() {
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && isset($_SESSION['tp_user']) && ($_SESSION['tp_user'] === 'gerente' || $_SESSION['tp_user'] === 'pizzaiolo')) {
        return true;
    }
    return false;
}

// Verificar acesso de gerente, redirecionar se não for gerente
function verificarAcessoGerente() {
    if(!verificar_acesso_gerente()) {
        header("Location: ../../HTML/index.php");
        exit();
    }
}

// Verificar acesso de gerente ou pizzaiolo, redirecionar se não for nenhum dos dois
function verificarAcessoGerenteEPizzaiolo() {
    if(!verificar_acesso_gerente_pizzaiolo()) {
        header("Location: ../HTML/index.php");
        exit();
    }
}

?>
