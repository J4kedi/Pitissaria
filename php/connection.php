<?php
  $username = "root";
  $password = "";
  $database = "pitissariadb"; 
  $server = "localhost";

  $conn = new mysqli($server, $username, $password, $database);
  
  if($conn->connect_error){
    die("Não foi possível conectar: " . $conn->connect_error);
  }
?>
