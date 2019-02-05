<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MercaPalacio</title>
    <link rel="shortcut icon" href="./imagenes/logo1.png" />
    <link rel="stylesheet" type="text/css" href="./css/cabecera.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style>
      span {
        width: 100px;
        display: inline-block;
      }
    </style>
  </head>

<?php

        if (isset($_POST["email"])) {

          $connection = new mysqli("localhost", "root", "Admin2015", "mercado");

          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
          }


          $consulta="select * from usuarios where
          email='".$_POST["email"]."' and passwd=md5('".$_POST["password"]."');";


          if ($result = $connection->query($consulta)) {

              if ($result->num_rows===0) {
               echo"<script>
            $(function() {
                alert('Login incorrecto');
             });
              </script>";
              } else {

                $_SESSION["user"]=$_POST["email"];
                $_SESSION["language"]="es";

                header("Location: index.php");
              }

          } else {
            echo "Wrong Query";
          }
      }
    ?>
<div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
      <h4 class="modal-title" id="myModalLabel">Iniciar Sesión</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
				</button>

			</div>
			<div class="modal-body">
            <form action="index.php" method="post">

<p>Email:<input name="email" required></p>
<p>Contraseña<input name="password" type="password" required></p>
<p><input type="submit" value="Iniciar sesión"></p>
<p>¿Aún no eres cliente?<a href="./registro.php">Regístrate</a></p>

</form>
			</div>
		</div>
	</div>
</div>