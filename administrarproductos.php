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
    <link rel="stylesheet" type="text/css" href="./css/administrar.css">
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
        include 'cabecera.php';
      };

      ?>
   

          <div class="row" style="padding-top:10px">
          <div class="col-md-6">
          <p>
  <button class="btn-danger btn-block btn-lg" type="button" data-toggle="collapse" data-target="#myCollapsible" aria-expanded="false" aria-controls="myCollapsible">
    Insertar Productos
  </button>
</p>
<div class="collapse" id="myCollapsible">
  <div class="card card-body" style="padding:0px">
  <?php
include 'insertarproductos.php'
?>
  </div>
</div>
         </div>
        <div class="col-md-6" style="padding-left:0px">
        <p>
        <button class="btn-danger btn-block btn-lg" type="button">
Editar Productos
  </button>
  </p>
        </div>

        </div>
      <script>
    $(function() {


    });
</script>
  </body>
</html>