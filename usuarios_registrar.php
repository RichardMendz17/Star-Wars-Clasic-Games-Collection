<?php 
    session_start();
    include("includes/conexion.php"); // Asegúrate de que "conexion.php" establece correctamente $conn

    if (isset($_SESSION['usuarioingresando'])) 
    {
        header("location: principal.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi sitio WEB</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="FormCajaLogin">
        <div class="FormLogin">
            <form action="" method="post" class="LoginForm">
                <h1>Crear nueva cuentsssa</h1>
                <br>

                <div class="TextoCajas">Ingresar Nombre</div>
                <input 
                    type="text" 
                    name="txtnombre" 
                    class="CajasTexto" 
                    required
                >

                <div class="TextoCajas">Ingresar Correo</div>
                <input 
                    type="email"
                    name="txtcorreo"
                    class="CajasTexto"
                    required
                >

                <div class="TextoCajas">Ingresar Contraseña</div>
                <input 
                    type="password"
                    id="password"
                    name="txtpassword"
                    class="CajasTexto"
                >

                <div class="CheckBox1">
                    <input 
                        type="checkbox" 
                        onclick="verpassword()">Mostrar contraseña
                </div>

                <div>
                    <input 
                        type="submit" 
                        value="Crear Nueva Cuenta" 
                        class="BtnRegistrar"
                        name="btnRegistrar">
                </div>
                <hr>
                <br>
                <div class="TextoCajas">
                    <a href="index.php" class="BtnRegistrar">Regresar</a>
                </div>
            </form>
        </div>

    </div>
</body>

<script>
    function verpassword()
    {
        var tipo = document.getElementById("password");
        if (tipo.type == "password") 
        {
            tipo.type = "text";    
        }
        else 
        {
            tipo.type = "password";
        }
    }
</script>
</html>


<?php 

    include("conexion.php");

    if (isset($_POST["btnRegistrar"])) {
        $nombre = $_POST["txtnombre"];
        $correo = $_POST["txtcorreo"];
        $pass = $_POST["txtpassword"];
        $rol = "Visitante";

        $insertarusu = mysqli_query($conn, "INSERT INTO usuarios (nom, correo,pass,rol) VALUES ('$nombre', '$correo', '$pass', '$rol')");

        if ($insertarusu) {
            echo "<script>alert('Usuario registrado con éxito: $nombre'); window.location='index.php'</script>";
        }
        else{
            echo "<script>alert('Correo duplicado, intenta con otro correo'); </script>";
        }
    }


?>