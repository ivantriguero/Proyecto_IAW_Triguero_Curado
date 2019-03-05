<?php
session_start();
if (isset($_SESSION["user"])) {
$connection = new mysqli("localhost", "root", "Admin2015", "mercado");
$connection->set_charset("utf8");

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
    <link rel="stylesheet" type="text/css" href="./css/index.css">
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
          <h1>Mi cuenta</h1>
    </div>
  </div>
      <?php
        echo"<div class='row justify-content-center' id='cuenta'>";
        echo"<div class='col-md-6'>";

        $connection = new mysqli("localhost", "root", "Admin2015", "mercado");
        $connection->set_charset("uft8");

        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
         }

        $query="SELECT * from usuarios where email='".$_SESSION["user"]."'";

        if ($result = $connection->query($query)) {

           if ($result->num_rows==0)      {
               echo "ERROR";
           } else {

                while($obj = $result->fetch_object()) {
                  echo "<div class='row justify-content-center'>
                  <div class='col-md-12'>
                  <form method='post'>
                  <div class='form-group'>
                  <div class='row'>
                    <div class='col'>
                    <label>Email</label>
                      <p>$obj->email</p>
                    </div>
                    <div class='col'>
                    <label>Editar</label>
                    <a href='editarcuenta.php?id=".$obj->cod_usuario."' class='btn btn-primary'><i class='fas fa-pencil-alt'></i></a>                    </div>
                  </div>
                  </div>
                  <div class='form-group'>
                    <label for='exampleInputPassword1'>Nombre</label>
                    <p>$obj->nombre</p>
                    <label for='exampleInputPassword1'>Apellidos</label>
                    <p>$obj->apellidos</p>
                    <label for='exampleInputPassword1'>Dirección</label>
                    <p>$obj->direccion</p>
                    <input type='hidden' name='cod' value='".$obj->cod_usuario."'>
                  </div>
                </form>
                </div>
                </div>";
                }

                
            }
        } else {
            echo "Error en consulta";
        }

      $result->close();
      unset($obj);
      unset($connection);
?>


      
      </div>
</div>

        
      </div>

  </body>
</html>