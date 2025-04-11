<?php
include("includes/conexion.php"); // Asegúrate de que "conexion.php" establece correctamente $conn
include("barra_lateral.php");

if ($_SESSION['rol'] !== 'Administrador') {
    header("location: index.php");
}
// Obtiene el usuario actualmente ingresado desde la sesión
$usuarioingresado = $_SESSION['usuarioingresando'];
$pagina = $_GET['pag'];
$correo = $_GET['correo'];

// Verifica si el usuario que se intenta eliminar es el mismo que está actualmente ingresado
if ($correo == $usuarioingresado) {
    // Si es el mismo usuario, muestra un mensaje de alerta y redirige a la tabla de usuarios
    echo "<script> alert('No puedes eliminar a tu propio usuario.'); window.location='usuarios_tabla.php' </script>";
} else {
    // Si no es el mismo usuario, realiza la consulta para eliminar al usuario de la base de datos
    mysqli_query($conn, "DELETE FROM usuarios WHERE correo='$correo'");

    // Redirige a la tabla de usuarios después de eliminar al usuario
    header("Location:usuarios_tabla.php?pag=$pagina");
}
