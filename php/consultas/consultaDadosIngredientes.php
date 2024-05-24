<?php
require_once('../PHP/conexao/connection.php');

$sql = "SELECT nome, preco, quantidade FROM ingredientes";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

function exibirIngredientes($result) {
    $initialValue = 4;

    foreach ($result as $ingrediente) {
        echo "
        <div class='card' id='". $ingrediente['id'] ."'>
            <label for='checkbox-$initialValue'>
                <input type='checkbox' id='checkbox-$initialValue' name='checkbox-$initialValue' max-length='1'/>
                <p>". $ingrediente['nome'] ."</p>
            </label>
            <input type='text' class='input-checkbox' name='quantidade'>
            <p class='checkbox-p'>qtd.</p>
        </div>
        ";

        $initialValue += 1;
    }
}
?>