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
            <span>Nombre:</span><input type="text" name="usuario" required><br>
            <span>Apellidos:</span><input type="text" name="apellidos" required><br>
            <span>Contraseña:</span><input type="password" name="passwd" required><br>
            <span>Dirección:</span><input type="text" name="direccion" required><br>
            <span>email:</span><input type="email" name="email"><br>
            <span>Tipo:</span><input type="text" name="tipo"><br>
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

        $query = "INSERT INTO usuarios (nombre,passwd,apellidos,direccion,email,tipo)
        VALUES ('$usuario','$passwd','$apellidos','$direccion','$email','$tipo')";


        if ($connection->query($query)) {

        echo "<h1>Cliente creado correctamente</h1>";


        } else {
          echo "ERROR al crear usuarios";
        }


        ?>

      <?php endif ?>
      </div>
</div>


</div>
          

  </body>
</html>