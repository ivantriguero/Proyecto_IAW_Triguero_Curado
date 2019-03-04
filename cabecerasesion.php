<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MercaPalacio</title>
    <link rel="shortcut icon" href="./imagenes/logo1.png" />
    <link rel="stylesheet" type="text/css" href="./css/cabecera.css">
    <link rel="stylesheet" type="text/css" href="./css/index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


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




            <div class="row" id="cabecera">
              <div class="col-md-1"><img src="./imagenes/logo1.png"></div>
              <div class="col-md-4"><h1>MercaPalacio</h1></div>
              <div class="col-md-6">
              <div class="row justify-content-end">
              <div class="col-md-2"><a href="./index.php"><button class="b1 btn btn-outline-danger">Inicio</button></a></div>
              <div class="col-md-2"><a href="./productos.php"><button class="b1 btn btn-outline-danger">Productos</button></a></div>
              <div class="col-md-2"><a href="./cuenta.php"><button type="button" class="b1 btn btn-outline-danger">Mi cuenta</button></a></div>
              <div class="col-md-2">
                <div>
                <div class="col-md-2"><a href="./carrito.php"><button type="button" class="b1 btn btn-outline-danger"><i class="fas fa-shopping-basket fa-3x"></i>
                <?php
                if(isset($_SESSION['cart']) & !empty($_SESSION['cart'])){

            echo"".sizeof($_SESSION['cart'])."";
          }
            ?>
                </a></div>

                </div>
              </div>
              <div class="col-md-2">
              <a href="./cerrarsesion.php"><button class="b1 btn btn-outline-danger"><i class="fas fa-sign-out-alt fa-3x"></i></button></a>
              
            </div>
              </div>
            </div>
            </div>



      <?php 

?>
          

  </body>
</html>