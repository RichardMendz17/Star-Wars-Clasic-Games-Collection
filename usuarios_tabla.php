<?php 
session_start();
include("includes/conexion.php"); // Asegúrate de que "conexion.php" establece correctamente $conn
if (!isset($_SESSION['usuarioingresando'])) {
    header("Location: index.php");
    exit;
}

$usuarioingresado = $_SESSION['usuarioingresando'];
$buscandousu = mysqli_query($conn, "SELECT * FROM usuarios WHERE correo = '$usuarioingresado'");
$mostrar = mysqli_fetch_array($buscandousu);

$_SESSION['rol'] = $mostrar['rol'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Star Wars: The Clone Wars | Ver usuarios</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="includes/verhora.js"></script>
</head>
<body  onload="setInterval(verhorafor12, 1000)">
    <header class="header">
        <div class="barra">
                <a href="index.php">
                    <img src="images/r2d2.png" alt="" style="width: 5rem; height: 5rem;">
                </a>
            <nav class="nav">
                <a href="registrarse.php">REGISTRARSE</a>
                <a href="contacto.php">CONTACTO</a>
            </nav>
            <div class="social">
                <a href="http://www.twitter.com" target="_blank">
                    <img src="images/twitter.PNG" alt="">
                </a>            
                <a href="http://www.facebook.com" target="_blank">
                    <img src="images/facebookblack.PNG" alt="">
                </a>
            </div> <!--Aqui Termina Social-->>
            <div class="buscador">
                <form class="input-buscador">
                    <input type="search" id="buscar" name="busqueda" placeholder="BUSCAR">
                </form>
            </div>
            <nav class="nav">
                <a href="DASHBOARD.php">DASHBOARD</a>
                <a href="includes/cerrar_sesion.php">CERRAR SESIÓN</a>
            </nav>
        </div> <!--Aqui termina class barra-->
    </header>
<hr>
<div class="ContenidoPrincipal">
    <h1><?php echo "Bienvenido: ". (isset($mostrar['nom']) ? $mostrar['nom'] : "Usuario"); ?></h1>
    <h2><?php echo "Correo: ". (isset($mostrar['correo']) ? $mostrar['correo'] : "No disponible"); ?></h2>
    <h2>La hora del sistema es: <span id="hora"></span></h3>
</div>



<div class="ContenedorPrincipal">
    <?php
    // Define el número máximo de filas que se mostrarán por página
    $filasmax = 5;

    // Verifica si se ha enviado el número de página a través de la URL
    if (isset($_GET['pag'])) {
        $pagina = $_GET['pag']; // Obtiene el número de página actual
    } else {
        $pagina = 1; // Si no se especifica, se establece la página inicial como 1
    }

    // Verifica si se ha enviado el formulario de búsqueda
    if (isset($_POST['btnbuscar'])) {
        $buscar = $_POST['txtbuscar']; // Obtiene el valor ingresado en el campo de búsqueda

        // Buscar usuarios por correo
        $sqlusu = mysqli_query($conn, "SELECT * FROM usuarios where correo = '" . $buscar . "'");
    } else {
        // Obtener usuarios ordenados por nombre, con paginación
        $sqlusu = mysqli_query($conn, "SELECT * FROM usuarios ORDER BY nom ASC LIMIT " . (($pagina - 1) * $filasmax)  . "," . $filasmax);
    }

    // Cuenta el número total de usuarios en la tabla
    $resultadoMaximo = mysqli_query($conn, "SELECT count(*) as num_usuarios FROM usuarios");

    // Obtiene el número total de usuarios
    $maxusutabla = mysqli_fetch_assoc($resultadoMaximo)['num_usuarios'];
    ?>
    <div class="ContenedorTabla">
        <!-- Formulario para buscar usuarios -->
        <form method="POST">
    <h2>Lista de usuarios</h2>

    <div class="form-container">
        <a href="usuarios_tabla.php" class="BotonesUsuarios">Inicio de la tabla</a>

        <!-- Campo de búsqueda y botón de búsqueda -->
        <input class="BotonesUsuarios" type="submit" value="Buscar" name="btnbuscar">
        <input class="CajaTexto" type="text" name="txtbuscar" placeholder="Ingresar correo" autocomplete="off" style='width:20%'>
    </div>
</form>


        <!-- Tabla para mostrar los usuarios -->
        <table>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Password</th>
                <th>Rol</th>
                <th>Acción</th>
            </tr>

            <?php
            // Ciclo sobre los resultados de la consulta y muestra cada usuario en una fila de la tabla
            while ($mostrar = mysqli_fetch_assoc($sqlusu)) {
                echo "<tr>";
                echo "<td>" . $mostrar['nom'] . "</td>"; // Muestra el nombre del usuario
                echo "<td>" . $mostrar['correo'] . "</td>"; // Muestra el correo del usuario
                echo "<td>*****</td>"; // Oculta la contraseña por seguridad
                echo "<td>" . $mostrar['rol'] . "</td>"; // Muestra el correo del usuario
                // echo "<td>".$mostrar['pass']."</td>"; // Mostrar la contraseña no es seguro

                    echo "<td style='width:24%'>";
                    echo "<a class='BotonesUsuarios' href=\"usuarios_ver.php?correo=$mostrar[correo]&pag=$pagina\">Ver</a>";
                    if ($_SESSION['rol'] == 'Administrador')
                    { 
                    echo "<a class='BotonesUsuarios' href=\"usuarios_modificar.php?correo=$mostrar[correo]&pag=$pagina\">Modificar</a>"; 
                    echo "<a class='BotonesUsuarios' href=\"usuarios_eliminar.php?correo=$mostrar[correo]&pag=$pagina\" onClick=\"return confirm('¿Estás seguro de eliminar a $mostrar[nom]?')\">Eliminar</a>";
                    }
                    echo "</td>";


            }
            ?>
        </table>

        <div style='text-align:right'>
            <br>
            <!-- Muestra el total de usuarios registrados en la tabla -->
            <?php echo "Total de usuarios: " . $maxusutabla; ?>
        </div>
    </div>
    <div style='text-align:right'>
        <br>
    </div>
    <div style="text-align:center">
        <?php
        if (isset($_GET['pag'])) {
            // Si la página actual es mayor a 1, muestra el botón "Anterior"
            if ($_GET['pag'] > 1) {
        ?>
                <a class="BotonesUsuarios" href="usuarios_tabla.php?pag=<?php echo $_GET['pag'] - 1; ?>">Anterior</a>
            <?php
            }
            // Si la página actual es la primera, desactiva el botón "Anterior"
            else {
            ?>
                <a class="BotonesUsuarios" href="#" style="pointer-events: none">Anterior</a>
            <?php
            }
        }
        // Si no se ha enviado el número de página, desactiva el botón "Anterior"
        else {
            ?>
            <a class="BotonesUsuarios" href="#" style="pointer-events: none">Anterior</a>
            <?php
        }

        if (isset($_GET['pag'])) {
            // Si hay más usuarios para mostrar en la siguiente página, habilita el botón "Siguiente"
            if ((($pagina) * $filasmax) < $maxusutabla) {
            ?>
                <a class="BotonesUsuarios" href="usuarios_tabla.php?pag=<?php echo $_GET['pag'] + 1; ?>">Siguiente</a>
            <?php
            }
            // Si no hay más usuarios, desactiva el botón "Siguiente"
            else {
            ?>
                <a class="BotonesUsuarios" href="#" style="pointer-events: none">Siguiente</a>
            <?php
            }
        }
        // Si no se ha enviado el número de página, habilita el botón "Siguiente" para ir a la página 2
        else {
            ?>
            <a class="BotonesUsuarios" href="usuarios_tabla.php?pag=2">Siguiente</a>
        <?php
        }
        ?>
    </div>
</div>
</body>
</html>