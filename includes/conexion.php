<?php 
    $host = "localhost";
    $nom = "root";
    $pass = "123456789";
    $db = "logincrud1";

    $conn = mysqli_connect($host, $nom, $pass, $db);

    if (!$conn) {
        die("Error en la conexión: ". mysqli_connect_error());
    }

?>