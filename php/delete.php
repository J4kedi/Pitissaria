<?php
    include("connection.php");
    
    $id = $_GET["id"];

    $sql = "DELETE FROM usuarios WHERE id = $id";
    if ($conn->query($sql) === TRUE){
        header("location: listagem.php");
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