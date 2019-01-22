<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MercaPalacio</title>
    <link rel="shortcut icon" href="./imagenes/logo1.png" />
    <link rel="stylesheet" type="text/css" href="./css/registro.css">
    <link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
    <style>
      span {
        width: 100px;
        display: inline-block;
      }
    </style>
  </head>
  <body>
  <div class ="container-fluid" id="contenedor">
      <?php 
include './cabecera.php';
?>
<div class="row justify-content-center" style="padding-top:10px">
      <div id="form" class="col-md-5">
      <?php if (!isset($_POST["usuario"])) : ?>
        <form method="post">
          <fieldset>
            <legend>- Registro -</legend>
            <span style='color:white'>Nombre:</span><input type="text" name="usuario" required><br>
            <span style='color:white'>Apellidos:</span><input type="text" name="apellidos" required><br>
            <span style='color:white'>Contraseña:</span><input type="password" name="passwd" required><br>
            <span style='color:white'>confirmar Contraseña:</span><input type="password" name="passwd1" required><br>
            <span style='color:white'>Dirección:</span><input type="text" name="direccion" required><br>
            <span style='color:white'>email:</span><input type="email" name="email"><br>
            <span style='color:white'>Tipo:</span><input  type="checkbox" name="tipo" value="administrador"><span style='color:white'>Administrador</span>
            <input type="checkbox" name="tipo" value="cliente"><span style='color:white'>Cliente</span>
            <br>
            <p><input type="submit" value="Crear"></p>
          </fieldset>
        </form>

      <?php else: ?>

        <?php

        $connection = new mysqli("localhost", "root", "Admin2015", "mercado",3316);
        $connection->set_charset("uft8");

        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }

        $usuario = $_POST["usuario"];
        $passwd = $_POST["passwd"];
        $apellidos = $_POST["apellidos"];
        $direccion = $_POST["direccion"];
        $email = $_POST["email"];
        $tipo = $_POST["tipo"];

        if ($_POST["passwd"]==$_POST["passwd1"]) {

        $query = "INSERT INTO usuarios (nombre,passwd,apellidos,direccion,email,tipo)
        VALUES ('$usuario',md5('$passwd'),'$apellidos','$direccion','$email','$tipo')";


        if ($connection->query($query)) {

        echo "<h1 style='color:white'>Cliente creado correctamente</h1>";
        echo "<a href='./index.php'><button class='btn btn-outline-danger' style='color:white'>Volver a la página principal</button></a>";


        } else {
          echo "ERROR al crear usuarios";
        }
      } else {
        echo"<?php if (!isset(".$_POST['usuario'].")) : ?>";
        echo"<form method='post'>";
        echo"<fieldset>";
        echo"<legend>- Registro -</legend>";
        echo"<span style='color:white'>Nombre:</span><input type='text' name='usuario' value='".$usuario."' required><br>";
        echo"<span style='color:white'>Apellidos:</span><input type='text' name='apellidos' value='".$apellidos."' required><br>";
        echo"<span style='color:white'>Contraseña:</span><input type='password' name='passwd' required><img src='./imagenes/logo2.png' style='width:4%;height:4%'><br>";
        echo"<span style='color:white'>confirmar Contraseña:</span><input type='password' name='passwd1' required><img src='./imagenes/logo2.png' style='width:4%;height:4%'><br>";
        echo"<span style='color:white'>Dirección:</span><input type='text' name='direccion' value='".$direccion."' required><br>";
        echo"<span style='color:white'>email:</span><input type='email' name='email' value='".$email."'><br>";
        echo"<span style='color:white'>Tipo:</span><input  type='checkbox' name='tipo' value='administrador'><span style='color:white'>Administrador</span>";
        echo"<input type='checkbox' name='tipo' value='cliente'><span style='color:white'>Cliente</span><br>";
        echo"<p style='color:red;background-color:black;width:200px'>Las contraseñas no coincien</p>";
        echo"<p><input type='submit' value='Crear'></p>";
        echo"</fieldset>";
        echo"</form>";
      }

        ?>

      <?php endif ?>
      </div>
</div>


</div>
          

  </body>
</html>