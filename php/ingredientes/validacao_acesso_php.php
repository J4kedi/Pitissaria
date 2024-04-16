<?php
session_start();

// Verificar se o usuário está logado e é um gerente
function verificar_acesso() {
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
        // Verifica se é gerente ou pizzaiolo
        if($_SESSION['tp_user'] === 'gerente' || $_SESSION['tp_user'] === 'pizzaiolo') {
            return true;
        }
    }
    return false;
}


// Verificar o acesso
function validar_acesso() {
    if(!verificar_acesso()) {
        header("Location: ../../HTML/index.php");
        exit();
    }
}
?>
