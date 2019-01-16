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
include 'cabecera.php';
?>

        <div class="container-fluid" style="padding:0px">
        <div class="row justify-content-center">
          <div class="col-md-10" style="margin-top:10px">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="./imagenes/mercado1.jpg" alt="First slide">
              <div class="carousel-caption d-none d-md-block">
             <h5>Clientes</h5>
              <p>Gestiona tu cuenta y todos tus pedidos</p>
            </div>
            </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="./imagenes/mercado2.jpg" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
    <h5>Productos</h5>
    <p>Selecciona entre todos nuestros productos para tu compra</p>
  </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="./imagenes/imagen1.jpg" alt="Third slide">
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
    </div>
    <div class="row justify-content-center" style="padding-top:10px">
    <div class="col-md-2 imagebox" style="padding:0px"><div class="imagen1"><a href="#" class="e1">Comida</a></div></div>
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