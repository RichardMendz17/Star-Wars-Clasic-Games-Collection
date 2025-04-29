<?php 
session_start();
include("includes/conexion.php"); // Asegúrate de que "conexion.php" establece correctamente $conn

$usuarioingresado = $_SESSION['usuarioingresando'];
$buscandousu = mysqli_query($conn, "SELECT * FROM usuarios WHERE correo = '$usuarioingresado'");
$mostrar = mysqli_fetch_array($buscandousu);

$_SESSION['rol'] = $mostrar['rol'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Star Wars: The Clone Wars</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="includes/verhora.js"></script>
    </head>
<body onload="setInterval(verhorafor12, 1000)">
    <header class="header">
        <div class="barra">
                <a href="index.php">
                    <img src="images/r2d2.png" alt="" style="width: 5rem; height: 5rem;">
                </a>
            <nav class="nav">
                <a href="registrarse.php">REGISTRARSE</a>
                <a href="contacto.php">CONTACTO</a>
            </nav>
            <div class="social">
                <a href="http://www.twitter.com" target="_blank">
                    <img src="images/twitter.PNG" alt="">
                </a>            
                <a href="http://www.facebook.com" target="_blank">
                    <img src="images/facebookblack.PNG" alt="">
                </a>
            </div> <!--Aqui Termina Social-->>
            <div class="buscador">
                <form class="input-buscador">
                    <input type="search" id="buscar" name="busqueda" placeholder="BUSCAR">
                </form>
            </div>
            <nav class="nav">
                <a href="usuarios_tabla.php">VER USUARIOS</a>
                <a href="includes/cerrar_sesion.php">CERRAR SESIÓN</a>
            </nav>
            <div class="NomUsuario">
                <?php echo isset($mostrar['nom']) ? $mostrar['nom'] : "Usuario"; ?>
                <?php echo isset($_SESSION['rol']) ? $_SESSION['rol'] : "Usuario sin rol"; ?>
            </div> 
        </div> <!--Aqui termina class barra-->
    </header>
<hr>

<div class="ContenidoPrincipal">
    <h1><?php echo "Bienvenido: ". (isset($mostrar['nom']) ? $mostrar['nom'] : "Usuario"); ?></h1>
    <h2><?php echo "Correo: ". (isset($mostrar['correo']) ? $mostrar['correo'] : "No disponible"); ?></h2>
    <h2>La hora del sistema es: <span id="hora"></span></h3>
</div>



</body>


</html>
