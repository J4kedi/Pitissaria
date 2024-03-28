<?php
    
    include("connection.php");

    $id = $_GET["id"];

    $sql = "DELETE FROM ingredientes WHERE id = $id";
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