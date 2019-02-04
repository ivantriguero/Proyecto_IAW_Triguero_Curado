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
  <body>

<?php 
include './iniciosesion.php';
?>




            <div class="row justify-content-end" style="border-bottom:2px solid white;background-color:#C70039;color:white">
              <div class="col-md-1"><a href="./cuenta.php"><button type="button" class="btn btn-outline-danger" style="color:white">
	            Mi cuenta
              </button></a></div>
              <div class="col-md-2"><a href="./cerrarsesion.php"><button class="btn btn-outline-danger" style="color:white">Cerrar Sesión</button></a></div>
            </div>
            <div class="row justify-content-center" style="background-color:#C70039">
              <div class="col-md-1"><img src="./imagenes/logo1.png" class="img-fluid"></div>
              <div class="col-md-4"><h1 style="font-size:270%;color:white">MercaPalacio</h1></div>
              <div class="col-md-1"><a href="./index.php"><button class="btn btn-outline-danger" style="color:white;height:100%">Inicio</button></a></div>
              <div class="col-md-1"><a href="./productos.php"><button class="btn btn-outline-danger" style="color:white;height:100%">Productos</button></a></div>
            </div>



      <?php 

?>
          

  </body>
</html>