<?php 
session_start();
include("includes/conexion.php"); // Asegúrate de que "conexion.php" establece correctamente $conn

// Verificar si el usuario está en sesión
if (isset($_SESSION['usuarioingresando'])) {
    $usuarioingresando = $_SESSION['usuarioingresando']; // Ahora sí está definido
    $buscandousu = mysqli_query($conn, "SELECT * FROM usuarios WHERE correo = '$usuarioingresando'");
    $mostrar = mysqli_fetch_array($buscandousu);
} else {
    header("location: index.php");
    exit; // Evitar que se ejecute más código después de redirigir
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>MI SITIO WEB</title>
</head>
<body>
    <div class="BarraLateral">
        <ul>
            <div class="NomUsuario">
                <?php echo isset($mostrar['nom']) ? $mostrar['nom'] : "Usuario"; ?>
            </div>
            <hr>
            <li><a href="principal.php">Inicio</a></li> 
            <li><a href="usuarios_tabla.php">Usuarios</a></li>
            <li><a href="cerrar_sesion.php">Cerrar Sesión</a></li>
        </ul>
    </div>
</body>
</html>
