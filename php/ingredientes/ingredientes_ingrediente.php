<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        $id = $_GET['id_ingrediente'];
        $sql = "SELECT id_ingrediente, nome_ingrediente FROM ingredientes WHERE id_ingredientes = $id";
        $result = $conn->query($sql);


        if ($result->num_rows >0){
            while ($row = $result->fetch_assoc()){
                echo "ID: $id";
                echo "Ingrediente: {$row['nome_ingrediente']}<br>";
            }
        }
    

    ?>
</body>
</html>