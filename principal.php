<?php 
session_start();
include("includes/conexion.php"); // Asegúrate de que "conexion.php" establece correctamente $conn

if (!isset($_SESSION['usuarioingresando'])) {
    header("location: login.php");
    exit;
}

$usuarioingresado = $_SESSION['usuarioingresando'];
$buscandousu = mysqli_query($conn, "SELECT * FROM usuarios WHERE correo = '$usuarioingresado'");
$mostrar = mysqli_fetch_array($buscandousu);

$_SESSION['rol'] = $mostrar['rol'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>MI SITIO</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body onload="setInterval(verhorafor12, 1000)">

    <div class="BarraLateral">
        <div class="NomUsuario">
            <?php echo isset($mostrar['nom']) ? $mostrar['nom'] : "Usuario"; ?>
            <?php echo isset($_SESSION['rol']) ? $_SESSION['rol'] : "Usuario sin rol"; ?>
        </div>
        <hr>
        <ul>
            <li><a class="descargar" href="principal.php">Inicio</a></li>
            <li><a class="descargar" href="usuarios_tabla.php">Usuarios</a></li>
            <li><a class="descargar" href="includes/cerrar_sesion.php">Cerrar Sesión</a></li>
        </ul>
    </div>

    <div class="ContenidoPrincipal">
        <h1><?php echo "Bienvenido: ". (isset($mostrar['nom']) ? $mostrar['nom'] : "Usuario"); ?></h1>
        <h2><?php echo "Correo: ". (isset($mostrar['correo']) ? $mostrar['correo'] : "No disponible"); ?></h2>
        <h3>La hora del sistema es: <span id="hora"></span></h3>
    </div>

    <script>
        function verhorafor12() {
            var fecha = new Date();
            var hora = fecha.getHours();
            var minutos = fecha.getMinutes();
            var segundos = fecha.getSeconds();
            var dianoche = "AM";
            if (hora >= 12) {
                dianoche = "PM";
                if (hora > 12) hora -= 12;
            }
            if (hora == 0) hora = 12;
            minutos = minutos < 10 ? "0" + minutos : minutos;
            segundos = segundos < 10 ? "0" + segundos : segundos;
            document.getElementById("hora").innerHTML = hora + ":" + minutos + ":" + segundos + " " + dianoche;
        }
    </script>
</body>
</html>
