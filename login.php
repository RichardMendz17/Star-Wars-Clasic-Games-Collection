<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Star Wars: The Clone Wars</title>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;700&family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
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
                <?php
                    include("includes/conexion.php");
                    include("includes/controlador.php");
                ?>

                <div class="input-group">
                    <input class="" type="text" name="email" value="" placeholder="Usuario">
                    <input class="" type="password" name="password" placeholder="Contraseña">
                    <input class="btn" type="submit" name="btningresar" value="Ingresar">
                </div>
            </form>
            <h2>Formulario Login</h2>

        <div class="form-txt">
            <p><a href="#">¿Olvidaste tu Contraseña?</a></p>

        </div>
        </section>
    </main>

</body>
</html>