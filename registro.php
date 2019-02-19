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
    <link rel="stylesheet" type="text/css" href="./css/cabecera.css">
    <link rel="stylesheet" type="text/css" href="./css/index.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
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
  <div class="row" id="cabecera">
              <div class="col-md-1 pl-5"><img src="./imagenes/logo1.png"></div>
              <div class="col-md-4 pl-0"><h1>MercaPalacio</h1></div>
              <div class="col-md-6">
              <div class="row justify-content-end">
              <div class="col-md-1"><a href="./index.php"><button class="b1 btn btn-outline-danger">Inicio</button></a></div>
              <div class="col-md-2"><a href="./productos.php"><button class="b1 btn btn-outline-danger">Productos</button></a></div>
              <div class="col-md-1"><button type="button" class="b1 btn btn-outline-danger" data-toggle="modal" data-target="#miModal">
	            <i class="far fa-user fa-3x"></i>
              </button>
            </div>
              <div class="col-md-1"><button type="button" class="b1 btn btn-outline-danger">
            <i class="fas fa-shopping-basket fa-3x"></i>
            </div>
            </div>
            </div>
            </div>

<div class="row justify-content-center" id="c2" >
    <div class="col-md-6">
          <h1>Registro</h1>
    </div>
  </div>
      <?php if (!isset($_POST["usuario"])) : ?>
      <div class='row justify-content-center' style="padding-top:10px">
            <div class='col-md-5'>
            <form method='post'>
            <div class='form-group'>
            <div class='row'>
              <div class='col'>
              <label>Email</label>
                <input type='text' name='email' class='form-control' placeholder="Email" required>
              </div>
              <div class='col'>
              <label>Contraseña</label>
                <input type='password' name='passwd' class='form-control' placeholder="Contraseña" required>
              </div>
            </div>
            </div>
            <div class='form-group'>
            <label for='exampleInputPassword1'>Confirmar contraseña</label>
              <input type='password' name='passwd1' class='form-control' placeholder="Confirmar contraseña" required>
              <label for='exampleInputPassword1'>Nombre</label>
              <input type='text' name='usuario' class='form-control' placeholder="Nombre" required>
              <label for='exampleInputPassword1'>Apellidos</label>
              <input type='text' name='apellidos' class='form-control' placeholder="Apellidos" required>
              <label for='exampleInputPassword1'>Dirección</label>
              <input type='text' name='direccion' class='form-control' placeholder="Dirección" required>
            </div>
            <button type='submit' class='btn btn-primary'>Registrar</button>
          </form>
          </div>
          </div>

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

        echo "<h1>Cliente creado correctamente</h1>";
        echo "<a href='./index.php'><button class='btn btn-outline-danger'>Volver a la página principal</button></a>";
        

        } else {
          echo "ERROR al crear usuarios";
        }
      } else {
        echo"<?php if (!isset(".$_POST['usuario'].")) : ?>";
        
        echo"      <div class='row justify-content-center' style='padding-top:10px'>
        <div class='col-md-5'>
        <form method='post'>
        <div class='form-group'>
        <div class='row'>
          <div class='col'>
          <label>Email</label>
            <input type='text' name='email' class='form-control' placeholder='Email' required>
          </div>
          <div class='col'>
          <label>Contraseña</label>
            <input type='password' name='passwd' class='form-control' placeholder='Contraseña' required><img src='./imagenes/logo2.png' style='width:9%;height:25%'>
          </div>
        </div>
        </div>
        <div class='form-group'>
        <label for='exampleInputPassword1'>Confirmar contraseña</label>
          <input type='password' name='passwd1' class='form-control' placeholder='Confirmar contraseña' required><img src='./imagenes/logo2.png' style='width:4%;height:4%'>
          <label for='exampleInputPassword1'>Nombre</label>
          <input type='text' name='usuario' class='form-control' placeholder='Nombre' required>
          <label for='exampleInputPassword1'>Apellidos</label>
          <input type='text' name='apellidos' class='form-control' placeholder='Apellidos' required>
          <label for='exampleInputPassword1'>Dirección</label>
          <input type='text' name='direccion' class='form-control' placeholder='Dirección' required>
        </div>
        <p style='color:red;background-color:black;width:200px'>Las contraseñas no coincien</p>
        <button type='submit' class='btn btn-primary'>Registrar</button>
      </form>
      </div>
      </div>";
      }} else {
      echo"<?php if (!isset(".$_POST['usuario'].")) : ?>";
        
      echo"      <div class='row justify-content-center' style='padding-top:10px'>
      <div class='col-md-5'>
      <form method='post'>
      <div class='form-group'>
      <div class='row'>
        <div class='col'>
        <label>Email</label>
          <input type='text' name='email' class='form-control' placeholder='Email' required><img src='./imagenes/logo2.png' style='width:9%;height:25%'>
        </div>
        <div class='col'>
        <label>Contraseña</label>
          <input type='password' name='passwd' class='form-control' placeholder='Contraseña' required>
        </div>
      </div>
      </div>
      <div class='form-group'>
      <label for='exampleInputPassword1'>Confirmar contraseña</label>
        <input type='password' name='passwd1' class='form-control' placeholder='Confirmar contraseña' required>
        <label for='exampleInputPassword1'>Nombre</label>
        <input type='text' name='usuario' class='form-control' placeholder='Nombre' required>
        <label for='exampleInputPassword1'>Apellidos</label>
        <input type='text' name='apellidos' class='form-control' placeholder='Apellidos' required>
        <label for='exampleInputPassword1'>Dirección</label>
        <input type='text' name='direccion' class='form-control' placeholder='Dirección' required>
      </div>
      <p style='color:red;background-color:black;width:200px'>Este email ya esta en uso</p>
      <button type='submit' class='btn btn-primary'>Registrar</button>
    </form>
    </div>
    </div>";
      }

        ?>

      <?php endif ?>

</div>
          

  </body>
</html>