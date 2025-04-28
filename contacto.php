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
            <img src="images/capitanrex.jpg" alt="Imagen de luje" style="height: 60rem; width: 30rem; border-radius: 10rem;">
        </div>
        <section class="form"> 
        <form action="https://formsubmit.co/ricardogamerkiller@gmail.com" method="POST">
            <h2>Contacto</h2>
            <div class="input-group">
                <label for="name">Nombre</label>
                <input 
                type="text"
                name="name"
                id="name" 
                placeholder="Nombre">
    
                <label for="phone">Teléfono</label>
                <input 
                type="tel" 
                name="phone" 
                id="phone" 
                placeholder="Teléfono">
    
                <label for="email">Email</label>
                <input 
                type="email"
                name="email"
                id="name"
                placeholder="E-mail">
    
                <label for="message">Mensaje</label>
                <textarea 
                name="message" 
                id="message"
                cols="30"
                rows="5"
                placeholder="Mensaje"></textarea>
                
                <div class="form-txt">
                    <a href="#">Política de privacidad</a>
                    <a href="#">Términos y condiciones</a>  
                </div>
                <input type="submit" class="btn" value="Enviar">
                <input type="hidden" name="_next" value="https://127.0.0.1:5500/index.html">
                <input type="hidden" name="_captcha" value="false">
            </div>
        </form>
        </section>
    </main>


</body>
</html>