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

  <div class="row justify-content-center" id="c1" >
    <div class="col-md-6">
          <h1>Productos</h1>
          <h2>Selecciona entre todos nuestros productos para tu compra</h2>
          <a href="./productos.php"><button class="b2">Saber más</button></a>
    </div>
  </div>

  <div class="row justify-content-center">
    <div id="cabecera1" class="col-md-11">
      <h1>Mercapalacio</h1>
    </div>
  </div>

  <div id="p1" class="row">
    <div id="imagen1" class="col-md-6">
      <img class="img-fluid" src="./imagenes/mercado.jpg" alt="">
    </div>
    <div class="col-md-6">
    Lorem ipsum dolor sit amet consectetur adipiscing elit consequat nostra suscipit, class magnis quis senectus lacinia dui convallis placerat netus iaculis, laoreet posuere vulputate interdum massa mollis aliquet vitae sociosqu. Platea per euismod integer facilisi nam aptent morbi, eu massa potenti diam enim cum cubilia, sed sem scelerisque purus ridiculus magnis. Inceptos quis augue litora magnis eu placerat, vivamus natoque varius nostra velit cursus, sem suscipit turpis tempus blandit. Facilisis orci volutpat pellentesque rhoncus mi nisi commodo enim quis dui, nunc penatibus feugiat congue dapibus ultrices cum tempor habitasse.

Mi dictum id nibh nunc vulputate sollicitudin class eu molestie vitae lacinia cubilia elementum sagittis egestas convallis facilisis, luctus curabitur sed pharetra est ut leo nisl tempor sem fringilla venenatis curae nec himenaeos vivamus. Ridiculus vehicula montes sagittis imperdiet cum morbi nulla sollicitudin, mi maecenas cras habitasse hendrerit lacus posuere taciti feugiat, faucibus ullamcorper interdum potenti dapibus urna quam. Ligula suscipit curabitur cras pellentesque integer netus imperdiet magna montes, lobortis est torquent leo molestie cursus blandit elementum, nulla vitae et posuere nisl dis in sollicitudin.

Luctus auctor natoque fusce egestas leo rhoncus eleifend donec faucibus, ad class ridiculus cursus per sodales vivamus habitasse, dis nullam volutpat nisl venenatis feugiat rutrum libero. Aptent eros pellentesque cursus platea interdum torquent semper sociis luctus habitasse, potenti fringilla dui condimentum faucibus risus ligula congue turpis, iaculis dis lobortis aenean curabitur hendrerit euismod nulla ut. Nostra eros laoreet posuere risus sem enim sociosqu aliquet, nibh donec urna consequat condimentum curabitur lacinia scelerisque habitasse, luctus lacus tellus auctor himenaeos elementum convallis. Metus hendrerit dapibus leo potenti curae iaculis convallis, interdum nec habitasse imperdiet placerat auctor tellus, taciti velit magnis justo consequat ac.    </div>
  </div>
  <?php 
  include 'pie.php';
  ?>
  </div>
</body>
</html>