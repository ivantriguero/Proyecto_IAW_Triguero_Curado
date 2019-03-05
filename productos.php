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
<div class="row justify-content-center" id="c2" >
    <div class="col-md-6">
          <h1>Productos</h1>
    </div>
  </div>
  <div class="row justify-content-end">
  <div class="col-md-3">
  <form method='post'>

  <input type="text" name="producto"><button type='submit' class='btn btn-danger'>Buscar</button>
      </form>
  </div>
  </div>
        <div class="container-fluid" style="padding:0px">
        <div class="row">
        <?php
        $connection = new mysqli("localhost", "root", "Admin2015", "mercado");
        $connection->set_charset("uft8");
        
        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }
        if (isset($_POST['producto'] )& !empty($_POST['producto'])){
          

          $query="select * from productos where descripcion like '%".$_POST['producto']."%'";

          if ($result = $connection->query($query)) {}
            if ($result->num_rows!==0) {


            while($obj = $result->fetch_object()) {
              if ($obj->stock==0){
              echo "<div class='col-md-2'>";
              echo "<div class='card'>";
              echo "<div class='d-flex align-items-center' style='witdh:220px;height:270px'><img class='rounded mx-auto d-block img-fluid' alt='Card image cap' src='data:image/png;base64,".base64_encode($obj->imagen)."'/></div>";
              echo "<div class='card-body'>";
              echo "<h3 class='card-title'>".$obj->descripcion."</h3>";
              echo "Stock: <span style='color:red'>Sin existencias</span><br>";
              echo "Precio: ".$obj->precio."€<br>";
              echo "</div>";
              echo "</div>";
              echo "</div>";
              }else{
              echo "<div class='col-md-2'>";
              echo "<div class='card'>";
              echo "<div class='d-flex align-items-center' style='witdh:220px;height:270px'><img class='rounded mx-auto d-block img-fluid' alt='Card image cap' src='data:image/png;base64,".base64_encode($obj->imagen)."'/></div>";
              echo "<div class='card-body'>";
              echo "<h3 class='card-title'>".$obj->descripcion."</h3>";
              echo "Stock: ".$obj->stock."<br>";
              echo "Precio: ".$obj->precio."€<br>";
              echo "<form method='post' action='addtocart.php?id=".$obj->cod_producto."&stock=".$obj->stock."'>";
              echo "Cantidad: <input type='number' name='cantidad' required>";
              echo "<button type='submit' id='button' class='btn btn-primary'>Comprar</button>";
              echo "</form>";
              echo "</div>";
              echo "</div>";
              echo "</div>";
              }
            }}else{
              echo "<h1>No se ha encontrado el producto ".$_POST['producto']."</h1>";
            }


        }else{
if(isset($_GET['stock']) & !empty($_GET['stock'])){  
  echo"<script>
  $(function() {
      alert('No existe suficiente stock del producto para tu pedido');
   });
    </script>";
}else{
  null;
}
        
        
          $query="select * from productos;";
        if ($result = $connection->query($query)) {}


          while($obj = $result->fetch_object()) {
            if ($obj->stock==0){
            echo "<div class='col-md-2'>";
            echo "<div class='card'>";
            echo "<div class='d-flex align-items-center' style='witdh:220px;height:270px'><img class='rounded mx-auto d-block img-fluid' alt='Card image cap' src='data:image/png;base64,".base64_encode($obj->imagen)."'/></div>";
            echo "<div class='card-body'>";
            echo "<h3 class='card-title'>".$obj->descripcion."</h3>";
            echo "Stock: <span style='color:red'>Sin existencias</span><br>";
            echo "Precio: ".$obj->precio."€<br>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            }else{
            echo "<div class='col-md-2'>";
            echo "<div class='card'>";
            echo "<div class='d-flex align-items-center' style='witdh:220px;height:270px'><img class='rounded mx-auto d-block img-fluid' alt='Card image cap' src='data:image/png;base64,".base64_encode($obj->imagen)."'/></div>";
            echo "<div class='card-body'>";
            echo "<h3 class='card-title'>".$obj->descripcion."</h3>";
            echo "Stock: ".$obj->stock."<br>";
            echo "Precio: ".$obj->precio."€<br>";
            echo "<form method='post' action='addtocart.php?id=".$obj->cod_producto."&stock=".$obj->stock."'>";
            echo "Cantidad: <input type='number' name='cantidad' required>";
            echo "<button type='submit' id='button' class='btn btn-primary'>Comprar</button>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            }
          }}



        ?>

</div>

      </div>
      <script>
    
</script>
  </body>
</html>