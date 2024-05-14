<?php
  $username = "root";
  $password = "PUC@1234";
  $database = "pitissariadb"; 
  $server = "localhost:3306";

  $conn = new mysqli($server, $username, $password, $database);
  
  if($conn->connect_error){
    die("Não foi possível conectar: " . $conn->connect_error);
  }
?>
