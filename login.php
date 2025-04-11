<?php 
    session_start();
    include("includes/conexion.php");
    if (isset($_SESSION['usuarioingresando'])){
        header("location: principal.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Star Wars: The Clone Wars</title>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;700&family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">

</head>
<body class="body">
    <header class="header">
        <div class="barra">
            <a href="/">
                <img src="images/r2d2.png" alt="" style="width: 5rem; height: 5rem;">
            </a>
            <nav class="nav">
                <a href="registrarse.php">REGISTRARSE</a>
                <a href="contacto.html">CONTACTO</a>
                <a href="login.php">INICIAR SESIÓN</a>
            </nav>
            <div class="social">
                <a href="http://www.twitter.com" target="_blank">
                    <img src="images/twitter.PNG" alt="">
                </a>            
                <a href="http://www.facebook.com" target="_blank">
                    <img src="images/facebookblack.PNG" alt="">
                </a>
            </div> <!--Aqui Termina Social-->>
            <form >
                <input type="search" id="buscar" name="busqueda" placeholder="BUSCAR">
            </form>
        </div> <!--Aqui termina class barra-->>
    </header>
    <section class="padding-red">
    </section>
    <section class="padding-blue">
    </section>

    <main>
        <section class="form">
            <form action="" method="POST">
            <h1 class="centrar-texto">Iniciar Sesión</h1>
            <br>
                <div class="input-group">
                    <input 
                    class="" 
                    type="text" 
                    name="txtcorreo" 
                    value="" 
                    placeholder="Usuario"
                        >
                    <input 
                    class="" 
                    type="password" 
                    name="txtpassword" 
                    placeholder="Contraseñas"
                    id="password" 
                        >
                    <div class="CheckBox1">
                        <input type="checkbox" onclick="verpassword()"> Mostrar Contraseña
                    </div>
                    <input type="submit" value="Iniciar Sesión" class="btn" name="btningresar">
                </div>
            </form>
            <h2>Formulario Login</h2>

        <div class="form-txt">
            <p><a href="#">¿Olvidaste tu Contraseña?</a></p>

        </div>
        </section>
    </main>
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
</body>
</html>
<?php 
include("includes/conexion.php"); // Asegúrate de que "conexion.php" establece correctamente $conn

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
                window.location.href = 'login.php';
              </script>";
              echo $correo;
              echo $password;
        exit; // Detiene el script para evitar ejecución innecesaria
    }
}
?>