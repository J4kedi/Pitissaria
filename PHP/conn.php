<?php
  $username = "root";
  $password = "";
  $database = "pitisaria";
  $server = "127.0.0.1:3306";

  $conn = new mysqli_connect($server, $username, $password, $database);
  
  if($conn->connect_error){
    die("Não foi possível conectar: " . $conn->connect_error);
  }
?>
