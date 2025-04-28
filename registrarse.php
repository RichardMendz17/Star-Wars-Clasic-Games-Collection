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
<!-- Incluir el header-->
<?php   
        session_start();
        include("nav.php"); // Conexión antes de cualquier acción
    ?>


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