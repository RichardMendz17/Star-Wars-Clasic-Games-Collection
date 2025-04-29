<?php
    include("conexion.php");

    if (isset($_POST['send'])) {
        if (
            strlen($_POST['name']) >= 1 &&
            strlen($_POST['email']) >= 1 &&
            strlen($_POST['password']) >= 1
        ) 
        {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $rol = 'Visitante';
            $fecha = date("d/m/y");
            $consulta = "INSERT INTO usuarios(nom, correo,pass,rol) VALUES ('$name', '$email', '$password', '$rol')";
            $resultado = mysqli_query($conn, $consulta);
            if ($resultado) {
                echo "<script>alert('Usuario registrado con éxito: $nombre'); window.location='index.php'</script>";
            }
            else{
                echo "<script>alert('Correo duplicado, intenta con otro correo'); </script>";
            }
        }
        else {
            ?>            
            <h3 class="error"> Llene todos los campos</h3>
                <?php 
               
        }
    }

    ?>