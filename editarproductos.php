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
        <div class="row">
        <?php
        $connection = new mysqli("localhost", "root", "Admin2015", "mercado");
        $connection->set_charset("uft8");
        
        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }
        
          $query="select * from productos;";

         
        if ($result = $connection->query($query)) {}


          while($obj = $result->fetch_object()) {

            echo "<div class='col-md-2'>";
            echo "<div class='card'>";
            echo "<form method='post'>";
            echo "<img class='card-img-top' alt='Card image cap' style='width:100%' src='data:image/png;base64,".base64_encode($obj->imagen)."'/>";
            echo "<div class='card-body'>";
            echo "<input type='hidden' name='cod' value='".$obj->cod_producto."'>";
            echo "<input type='text' name='desc' value='".$obj->descripcion."'>";
            echo "Cantidad: <input type='number' name='stock' value='".$obj->stock."'><br>";
            echo "Precio: <input type='number' name='precio' value='".$obj->precio."'>€<br>";
            echo "<input type='submit' value='Editar' class='btn btn-primary'>";
            echo "</div>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
          }
          if (array_key_exists('cod', $_POST)) {

          $query="update productos set descripcion='".$_POST["desc"]."',precio='".$_POST["precio"]."',
          stock='".$_POST["stock"]."' WHERE cod_producto='".$_POST["cod"]."'";
          if ($result = $connection->query($query)) {

          } else {
            echo "Error al actualizar los datos";
          }
        }

        ?>

</div>

      </div>
      <script>
    $(function() {


    });
</script>
  </body>
</html>