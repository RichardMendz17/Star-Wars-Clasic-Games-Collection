<?php 
session_start();
include("includes/conexion.php"); // Conexión antes de cualquier acción



// Si está enviando el formulario
if (isset($_POST['btningresar'])) {
    $correo = trim($_POST["txtcorreo"]);
    $password = trim($_POST["txtpassword"]);
    
    // Preparar consulta segura
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE correo = ? AND pass = ?");
    $stmt->bind_param("ss", $correo, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    echo "Correo enviado: $correo<br>";
    echo "Password enviado: $password<br>";
    if ($result->num_rows == 1) { 
        $_SESSION['usuarioingresando'] = $correo;
        header("Location: dashboard.php");

    } else {    
        echo "<script>
                alert('Usuario no encontrado');
                window.location.href = 'login.php';
              </script>";

    }
}
?>
<!-- Aquí sí empieza el HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Star Wars: The Clone Wars</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
</head>
<body class="body">
<!-- Incluir el header-->
    <?php 
        include("nav.php"); // Conexión antes de cualquier acción
    ?>

    <main>
        <section class="form">
            <form action="" method="POST">
                <h1 class="centrar-texto">Iniciar Sesión</h1>
                <div class="input-group">
                    <input type="text" name="txtcorreo" placeholder="Usuario">
                    <input type="password" name="txtpassword" placeholder="Contraseña" id="password">
                    <div class="CheckBox1">
                        <input type="checkbox" onclick="verpassword()"> Mostrar Contraseña
                    </div>
                    <input type="submit" value="Iniciar Sesión" class="btn" name="btningresar">
                </div>
            </form>
        </section>
    </main>
    <script>
    function verpassword() {
        var tipo = document.getElementById("password");
        if (tipo.type == "password") {
            tipo.type = "text";    
        } else {
            tipo.type = "password";
        }
    }
    </script>
</body>
</html>
