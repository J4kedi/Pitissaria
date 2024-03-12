<?php
    /*
    Pagina  criada por: Arthur Hermes, Kauan Pardini, Ricardo Amaro Pedreira, Valdemar Alonso Arndt.
    */
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $bdname = "cliente_cadastro";

    $conn = new mysqli($servername,$username,$password,$bdname);
    if ($conn->connect_error){
        die("Connection failed" . $conn-> connect_error);
    }
?> 