<?php


function verificarAcesso() {
    if (!isset($_SESSION['tp_user']) || !in_array($_SESSION['tp_user'], ['gerente', 'pizzaiolo'])) {
        // Redirecionar para uma página de acesso negado ou página de login
        header("Location: acesso_negado.php");
        exit();
    }
}
?>
