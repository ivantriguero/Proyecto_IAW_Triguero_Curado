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
        $result->close();
        unset($obj);
        unset($connection);
      } elseif ($obj->tipo=="administrador") {
        include 'cabeceraadmi.php';
        $result->close();
        unset($obj);
        unset($connection);
      } }else {
        include 'cabecera.php';
      };

?>

        <div class="container-fluid" style="padding:0px">
          <div class="row justify-content-center">
            <div class="col-md-12" style="padding:0px">
              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active" style="background-image:url('./imagenes/mercado5.jpg');background-attachment:fixed;background-repeat: no-repeat;background-size: cover;">
                    <div class="carousel-caption d-none d-md-block">
                      <h1>Productos</h1>
                      <h5>Selecciona entre todos nuestros productos para tu compra</h5>
                    </div>
                  </div>
                  <div class="carousel-item">
                  <a href="./productos.php">
                    <img class="d-block w-100" src="./imagenes/mercado1.jpg" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>Clientes</h5>
                      <p>Gestiona tu cuenta y todos tus pedidos</p>
                    </div>
                    </a>
                  </div>
                  <div class="carousel-item">
                    
                    <div class="carousel-caption d-none d-md-block">
                      <h5>Proveedores</h5>
                      <p>Revisa y conoce a todos nuestros proveedores</p>
                    </div>
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
          </div>

    <div class="row justify-content-center" style="padding-top:10px">
    <div class="col-md-3 imagebox" style="padding:0px"><div id="imagen1" class="imagen1"><a href="#" class="e1">Comida</a></div></div>
    <div class="col-md-3 imagebox" style="padding:0px"><div id="imagen2" class="imagen1"><a href="#" class="e1">Bebidas</a></div></div>
    <div class="col-md-3 imagebox" style="padding:0px"><div id="imagen3" class="imagen1"><a href="#" class="e1">Higiene</a></div></div>
    </div>
      </div>
      </div>
      </div>
      <script>
    $(function() {
      $('.carousel').carousel()


    });
</script>
  </body>
</html>