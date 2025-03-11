<?php
    include("conexion.php");

    if (isset($_POST['send'])) {
        if (
            strlen($_POST['name']) >= 1 &&
            strlen($_POST['email']) >= 1 &&
            strlen($_POST['password']) >= 1 &&
            strlen($_POST['phone']) >= 1 
        ) 
        {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $phone = trim($_POST['phone']);
            $fecha = date("d/m/y");
            $consulta = "INSERT INTO datos(nombre, email, contraseña, telefono, fecha) VALUES ('$name','$email','$password','$phone', '$fecha' )";
            $resultado = mysqli_query($conex, $consulta);
            if($resultado){
                ?>
                <h3 class="success">Tu registro se ha completado</h3>
                <?php
            } else {
                ?>
                <h3 class="error">Ocurrio un error</h3>
                <?php
            }
        }
        else {
            ?>            
            <h3 class="error"> Llene todos los campos</h3>
                <?php 
               
        }
    }

    ?>