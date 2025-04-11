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
        <div class="luke">
            <img src="images/luk2.webp" alt="Imagen de luje" style="height: 50rem; width: 30rem;">
        </div>
        <section class="form">
            <form action="#" method="post" autocomplete="off">

            <h2>Formulario de registro</h4>
            <div class="input-group">

            <input 
                type="text" 
                name="name" 
                id="nombres" 
                placeholder="Ingrese su nombre">
            <input 
                type="tel" 
                name="phone" 
                id="phone" 
                placeholder="Ingrese su número de telefono">
            <input 
                type="email" 
                name="email" 
                id="correo" 
                placeholder="Ingrese su correo">
            <input 
                type="password" 
                name="password" 
                id="contrasena" 
                placeholder="Ingrese su contraseña">
            <p>Estoy de acuerdo con <a href="#">Términos y condiciones</a></p>
            <input class="btn" type="submit" name="send" value="Enviar">
            <p><a href="#">Ya tengo una cuenta</a></p>

            </div>
            </form>

        </section>


        <?php 
        include("includes/send.php");
    ?>
        <div class="darth">
            <img src="images/Vader.webp" alt="Imagen de luje" style="height: 50rem; width: 30rem;">
        </div>
    </main>
</body>
</html>