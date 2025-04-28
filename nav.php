<header class="header">
        <div class="barra">
            <a href="index.php">
                <img src="images/r2d2.png" alt="" style="width: 5rem; height: 5rem;">
            </a>
            <nav class="nav">
                <a href="registrarse.php">REGISTRARSE</a>
                <a href="contacto.php">CONTACTO</a>
                <?php if (!empty($_SESSION['usuarioingresando'])) { ?>
                    <a href="dashboard.php">DASHBOARD</a>
                    <a href="includes/cerrar_sesion.php">CERRAR SESIÓN</a>
                <?php } else { ?>
                    <a href="login.php">INICIAR SESIÓN</a>
                <?php } ?>
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