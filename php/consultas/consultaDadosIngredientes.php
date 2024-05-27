<?php
function exibirIngredientes() {
    require_once('../PHP/conexao/connection.php');
    
    $sql = "SELECT id, nome, preco, quantidade FROM ingredientes";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $initialValue = 4;

    foreach ($result as $ingrediente) {
        echo "
        <div class='card' id='". $ingrediente['id'] ."'>
            <label for='checkbox-$initialValue' class='1'>
                <input type='checkbox' id='checkbox-$initialValue' name='checkbox-$initialValue' max-length='1' value='". $ingrediente['preco'] ."'/>
                <p name='nome'>". $ingrediente['nome'] ."</p>
            </label>
            <input type='number' value='1' class='input-checkbox' min='1' max='10' name='quantidade'>
            <p class='checkbox-p'>qtd.</p>
        </div>
        ";

        $initialValue += 1;
    }
}
?>