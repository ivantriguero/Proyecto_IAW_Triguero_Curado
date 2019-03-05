<?php
session_start();
if (isset($_SESSION["user"])) {
$connection = new mysqli("localhost", "root", "Admin2015", "mercado");
$connection->set_charset("uft8");

if ($connection->connect_errno) {
    printf("Connection failed: %s\n", $connection->connect_error);
    exit();
}

  $query="select tipo from usuarios where
  email='".$_SESSION["user"]."';";
if ($result = $connection->query($query)) {}
    $obj = $result->fetch_object();
  }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MercaPalacio</title>
    <link rel="shortcut icon" href="./imagenes/logo1.png" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
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
      if (isset($_SESSION["user"])) {
        if ($obj->tipo=="cliente"){
        include 'cabecerasesion.php';
      } elseif ($obj->tipo=="administrador") {
        include 'cabeceraadmi.php';
      } }else {
        session_destroy();
        header("Location: index.php");
      };

      ?>

<div class="row justify-content-center" id="c2" >
    <div class="col-md-6">
          <h1>Clientes</h1>
    </div>
  </div>
  <a class='b1 btn btn-outline-danger' href='administrar.php'><i class='fas fa-arrow-left'></i></a>

        <?php
        $connection = new mysqli("localhost", "root", "Admin2015", "mercado");
        $connection->set_charset("utf8");
        
        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }
        
          $query="select * from usuarios where cod_usuario='".$_GET['id']."';";


        if ($result = $connection->query($query)) {}
          if (!isset($_POST["email"])) {
          while($obj = $result->fetch_object()) {

            echo "
            <table class='table table-hover'>
              <thead><tr>
              <th scope='col'>Cod</th>            
              <th scope='col'>Nombre</th>
              <th scope='col'>Apellidos</th>
              <th scope='col'>Dirección</th>
              <th scope='col'>Email</th>
              </tr></thead>
            <tr>
            <th scope='row'>".$obj->cod_usuario."</th>
            <td>$obj->nombre</td>
            <td>$obj->apellidos</td>
            <td>$obj->direccion</td>
            <td>$obj->email</td>
            <tr>
            ";
            $cod=$obj->cod_usuario;
            echo "<div class='row justify-content-center'>
            <div class='col-md-5'>
            <form method='post'>
            <div class='form-group'>
            <div class='row'>
              <div class='col'>
              <label>Email</label>
                <input type='text' name='email' class='form-control' value='".$obj->email."' required>
              </div>
              <div class='col'>
              <label>Contraseña</label>
                <input type='password' name='passwd' class='form-control' required>
              </div>
            </div>
            </div>
            <div class='form-group'>
              <label for='exampleInputPassword1'>Nombre</label>
              <input type='text' name='nombre' class='form-control' value='".$obj->nombre."' required>
              <label for='exampleInputPassword1'>Apellidos</label>
              <input type='text' name='apellidos' class='form-control' value='".$obj->apellidos."' required>
              <label for='exampleInputPassword1'>Dirección</label>
              <input type='text' name='direccion' class='form-control' value='".$obj->direccion."' required>
              <input type='hidden' name='cod' value='".$obj->cod_usuario."'>
            </div>
            <button type='submit' class='btn btn-primary'>Editar</button>
          </form>
          </div>
          </div>";
        }
          
       }
          if (array_key_exists('email', $_POST)) {
            $cod=$_POST["cod"];
            if ($result = $connection->query($query)) {}
              $obj = $result->fetch_object();
              $email=$_POST["email"];

            $query = "select * from usuarios where email='".$email."' AND cod_usuario!='".$cod."'";
        if ($result = $connection->query($query)) {}
        $obj = $result->fetch_object();
        if ($result->num_rows==0) {
            $_SESSION["user"]=$_POST['email'];
          $query="update usuarios set nombre='".$_POST["nombre"]."',passwd=md5('".$_POST["passwd"]."'),
          apellidos='".$_POST["apellidos"]."',direccion='".$_POST["direccion"]."',email='".$_POST["email"]."' WHERE cod_usuario='".$cod."'";

          if ($result = $connection->query($query)) {
            header('Location: administrar.php?editado=si');

          }
        } else {

          $query="select * from usuarios AND cod_usuario='".$cod."';";


          if ($result = $connection->query($query)) {}
            while($obj = $result->fetch_object()) {
  
              echo "
              <table class='table table-hover'>
                <thead><tr>
                <th scope='col'>Cod</th>            
                <th scope='col'>Nombre</th>
                <th scope='col'>Apellidos</th>
                <th scope='col'>Dirección</th>
                <th scope='col'>Email</th>
                </tr></thead>
              <tr>
              <th scope='row'>".$obj->cod_usuario."</th>
              <td>$obj->nombre</td>
              <td>$obj->apellidos</td>
              <td>$obj->direccion</td>
              <td>$obj->email</td>
              <tr>
              ";
              $cod=$obj->cod_usuario;
              echo "<div class='row justify-content-center'>
              <div class='col-md-5'>
              <form method='post'>
              <div class='form-group'>
              <div class='row'>
                <div class='col'>
                <label>Email</label>
                  <input type='text' name='email' class='form-control' value='".$obj->email."' required>
                </div>
                <div class='col'>
                <label>Contraseña</label>
                  <input type='password' name='passwd' class='form-control' required>
                </div>
              </div>
              </div>
              <div class='form-group'>
                <label for='exampleInputPassword1'>Nombre</label>
                <input type='text' name='nombre' class='form-control' value='".$obj->nombre."' required>
                <label for='exampleInputPassword1'>Apellidos</label>
                <input type='text' name='apellidos' class='form-control' value='".$obj->apellidos."' required>
                <label for='exampleInputPassword1'>Dirección</label>
                <input type='text' name='direccion' class='form-control' value='".$obj->direccion."' required>
                <input type='hidden' name='cod' value='".$obj->cod_usuario."'>
              </div>
              <button type='submit' class='btn btn-primary'>Editar</button>
            </form>
            <h4 style='color:red'>Este email ya está en uso</h4>
            </div>
            </div>";
          }
            
         


          }
          }
        
        ?>



      <script>
    $(function() {


    });
</script>
  </body>
</html>

       