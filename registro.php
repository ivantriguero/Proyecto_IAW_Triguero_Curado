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
  <body>
  <div class ="container-fluid" id="contenedor">

            <div class="row justify-content-center" style="background-color:#C70039;height:77px">
              <div class="col-md-1"><img src="./imagenes/logo1.png" class="img-fluid"></div>
              <div class="col-md-4"><h1 style="font-size:270%;color:white">MercaPalacio</h1></div>
              <div class="col-md-1"><a href="./productos.php"><button class="btn btn-outline-danger" style="color:white;height:100%">Productos</button></a></div>

            </div>
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
            <p><input type="submit" value="Crear"></p>
          </fieldset>
        </form>

      <?php else: ?>

        <?php
        $usuario = $_POST["usuario"];
        $passwd = $_POST["passwd"];
        $apellidos = $_POST["apellidos"];
        $direccion = $_POST["direccion"];
        $email = $_POST["email"];

        $connection = new mysqli("localhost", "root", "Admin2015", "mercado",3316);
        $connection->set_charset("uft8");

        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }


        $query = "select * from usuarios where email='".$email."'";
        if ($result = $connection->query($query)) {}
        $obj = $result->fetch_object();
        if ($result->num_rows==0) {

        if ($_POST["passwd"]==$_POST["passwd1"]) {

        $query = "INSERT INTO usuarios (nombre,passwd,apellidos,direccion,email,tipo)
        VALUES ('$usuario',md5('$passwd'),'$apellidos','$direccion','$email','cliente')";


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
        echo"<p style='color:red;background-color:black;width:200px'>Las contraseñas no coincien</p>";
        echo"<p><input type='submit' value='Crear'></p>";
        echo"</fieldset>";
        echo"</form>";
      }} else {
                echo"<?php if (!isset(".$_POST['usuario'].")) : ?>";
        echo"<form method='post'>";
        echo"<fieldset>";
        echo"<legend>- Registro -</legend>";
        echo"<span style='color:white'>Nombre:</span><input type='text' name='usuario' value='".$usuario."' required><br>";
        echo"<span style='color:white'>Apellidos:</span><input type='text' name='apellidos' value='".$apellidos."' required><br>";
        echo"<span style='color:white'>Contraseña:</span><input type='password' name='passwd' required><br>";
        echo"<span style='color:white'>confirmar Contraseña:</span><input type='password' name='passwd1' required><br>";
        echo"<span style='color:white'>Dirección:</span><input type='text' name='direccion' value='".$direccion."' required><br>";
        echo"<span style='color:white'>email:</span><input type='email' name='email' value='".$email."'><img src='./imagenes/logo2.png' style='width:4%;height:4%'><br>";
        echo"<p style='color:red;background-color:black;width:200px'>Este email ya esta en uso</p>";
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