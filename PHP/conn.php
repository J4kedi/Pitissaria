<?php
  $username = "root";
  $password = "";
  $database = "pitissariadb";
  $server = "127.0.0.1";

  $conn = new mysqli_connect($server, $username, $password, $database);
  
  if($conn->connect_error){
    die("Não foi possivel conectar: " . $conn->connect_error)
    }
?>