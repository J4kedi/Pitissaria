<?php
    include("../connection.php");
    include("validacao_acesso_php.php");
    validar_acesso();
    if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['tipo'] !== 'pizzaiolo') {
        // Redirecionar para uma página de erro ou página de login
        header("Location: lista_ingredientes.php"); // Altere para a página que deseja redirecionar
        exit(); // Encerrar o script
    }

    $id = $_GET["id"];

    $sql = "DELETE FROM ingrediente WHERE id_ingrediente = $id";
    if ($conn->query($sql) === TRUE){
        header("location: lista_ingredientes.php");
    }
    else {
?>
<script>
    alert("Operação falhou");
    history.go(-1);
</script>
<?php
    }


?>