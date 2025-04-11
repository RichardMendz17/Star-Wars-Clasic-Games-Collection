


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>MI SITIO</title>
</head>
<body>
    <div class="FormCajaLogin">
        <div class="FormLogin">
            <form action="" method="post" class="LoginForm">
                <h1>Iniciar Sesión</h1>
                <br>

                <div class="TextoCajas">Ingresar Correo
                <input 
                    type="text" 
                    name="txtcorreo" 
                    class="CajasTexto" 
                    required>
                </div>
                <div class="TextoCajas">Ingresar Contraseña
                    <input 
                    type="password" 
                    name="txtpassword" 
                    class="CajasTexto" 
                    id="txtpassword" 
                    required>
                </div>
                <div class="CheckBox1">
                    <input type="checkbox" onclick="verpassword()"> Mostrar Contraseña
                </div>

                <div>
                    <input type="submit" value="Iniciar Sesión" class="BtnLogin" name="btningresar">
                </div>

                <hr>
                <br>

                <div class="TextoCajas">
                    <a href="usuarios_registrar.php" class="BtnRegistrar">Crear nueva cuenta</a>
                </div>

            </form>
        </div>
    </div>
</body>



</html>

<?php 
include("conexion.php"); // Asegúrate de que "conexion.php" establece correctamente $conn

if (isset($_POST['btningresar'])) {
    $correo = $_POST["txtcorreo"];
    $password = $_POST["txtpassword"];

    // Evitar inyección SQL con consultas preparadas
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE correo = ? AND pass = ?");
    $stmt->bind_param("ss", $correo, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) { // Verifica si existe el usuario
        $_SESSION['usuarioingresando'] = $correo; // Guarda la sesión del usuario
        header("Location: principal.php"); // Redirige a la página principal
        exit; // IMPORTANTE: detiene la ejecución después de la redirección
    } else {
        echo "<script>
                alert('Usuario no encontrado');
                window.location.href = 'index.php';
              </script>";
        exit; // Detiene el script para evitar ejecución innecesaria
    }
}
?>
