<?php
include("includes/conexion.php"); // Asegúrate de que "conexion.php" establece correctamente $conn
include("usuarios_tabla.php");
$pagina = $_GET['pag'];
$correo = $_GET['correo'];
if ($_SESSION['rol'] !== 'Administrador') {
    header("location: index.php");
}
$querybuscar = mysqli_query($conn, "SELECT * FROM usuarios WHERE correo = '$correo'");

while ($mostrar = mysqli_fetch_array($querybuscar)) {
    $usunom     = $mostrar['nom'];      // Contiene el nombre del usuario
    $usucorreo  = $mostrar['correo'];   // Contiene el correo del usuario
    $pass       = $mostrar['pass'];     // Contiene la contraseña del usuario
    $rol        = $mostrar['rol'];    // Contiene la contraseña del usuario
}
?>
<html>

<body>
    <!-- Mostrar el formulario de modificación del usuario -->
    <div class="caja_popup2">
        <form class="contenedor_popup" method="POST">
            <table>
                <tr>
                    <!-- Título de la tabla -->
                    <th colspan="2">Modificar usuario</th>
                </tr>
                <tr>
                    <!-- Campo para modificar el nombre del usuario -->
                    <td>Nombre</td>
                    <td><input class="CajaTexto" type="text" name="txtnom" value="<?php echo $usunom; ?>" required></td>
                </tr>
                <tr>
                    <!-- Campo para mostrar el correo del usuario (solo muestra no midifica) -->
                    <td>Correo</td>
                    <td><input class="CajaTexto" type="email" name="txtcorreo" value="<?php echo $usucorreo; ?>" readonly></td>
                </tr>
                <tr>
                    <!-- Campo para modificar la contraseña del usuario -->
                    <td>Password</td>
                    <td><input class="CajaTexto" type="password" name="txtpass" value="<?php echo $pass; ?>" required></td>
                </tr>
                <tr>
                    <!-- Campo para modificar la contraseña del usuario -->
                    <td>Rol</td>
                    <td>
                        <select id="opciones" name="opciones">
                            <option value="Administrador">Administrador</option>
                            <option value="Visitante" selected>Visitante</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <!-- Botones para cancelar o confirmar la modificación -->
                    <td colspan="2">
                        <?php echo "<a class='BotonesUsuarios' href=\"usuarios_tabla.php?pag=$pagina\">Cancelar</a>"; ?>
                        <input class="BotonesUsuarios" type="submit" name="btnmodificar" value="Modificar" onClick="javascript: return confirm('¿Deseas modificar este usuario?');">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>

<?php
// Verifica si se ha enviado el formulario de modificación
if (isset($_POST['btnmodificar'])) {
    $nom1       = $_POST['txtnom'];     // Nuevo nombre del usuario
    $correo1    = $_POST['txtcorreo'];  // Correo del usuario (no se modifica)
    $pass1      = $_POST['txtpass'];    // Nueva contraseña del usuario
    $rol        = $_POST['opciones'];    // Nueva contraseña del usuario

    echo $rol;
    // Realiza la consulta para actualizar los datos del usuario en la base de datos
    $querymodificar = mysqli_query($conn, "UPDATE usuarios SET nom='$nom1',correo='$correo1',pass='$pass1',rol='$rol' WHERE correo = '$correo1'");

    // Redirige a la tabla de usuarios después de la modificación
    echo "<script>window.location= 'usuarios_tabla.php?pag=$pagina' </script>";
}
?>
