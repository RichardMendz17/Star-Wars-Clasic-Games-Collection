<?php
include("includes/conexion.php"); // Asegúrate de que "conexion.php" establece correctamente $conn

include("usuarios_tabla.php");

// Obtiene el número de página actual desde la URL
$pagina = $_GET['pag'];

// Obtiene el correo del usuario desde la URL
$correo = $_GET['correo'];

// Realiza una consulta para buscar el usuario en la base de datos por su correo
$querybuscar = mysqli_query($conn, "SELECT * FROM usuarios WHERE correo = '$correo'");

while ($mostrar = mysqli_fetch_array($querybuscar)) {
    $usunom     = $mostrar['nom'];      // Muestra el nombre del usuario
    $usucorreo  = $mostrar['correo'];   // Muestra el correo del usuario
}
?>
<html>
<body>
    <!-- Mostrar los datos del usuario -->
    <div class="caja_popup2">
        <form class="contenedor_popup" method="POST">
            <table>
                <tr>
                    <!-- Título de la tabla -->
                    <th colspan="2">Ver usuario</th>
                </tr>
                <tr>
                    <!-- Muestra el nombre del usuario -->
                    <td><b>Nombre:</b></td>
                    <td><?php echo $usunom; ?></td>
                </tr>
                <tr>
                    <!-- Muestra el correo del usuario -->
                    <td><b>Correo: </b></td>
                    <td><?php echo $usucorreo; ?></td>
                </tr>
                <tr>
                    <!-- Botón para regresar a la tabla de usuarios -->
                    <td colspan="2">
                        <?php echo "<a class='BotonesUsuarios' href=\"usuarios_tabla.php?pag=$pagina\">Regresar</a>"; ?>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
