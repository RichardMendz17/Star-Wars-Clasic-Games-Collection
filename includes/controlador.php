<?php 
 if (!empty(($_POST['btningresar']))){
    if (empty($_POST['name']) and empty($_POST['password'])){
      echo "Los campos están vacíos";
    } else {
      $email= $_POST['email'];
      $contraseña= $_POST['password'];
      $sqli = $conex->query("SELECT * FROM datos WHERE email='$email' and contraseña='$contraseña'");
      
      if ($datos=$sqli->fetch_object()){
         header("Location: index.html");
      } else {
         echo "Usuario y/o contraseña incorrectos";
      }
    }
 } else {

 }
?>