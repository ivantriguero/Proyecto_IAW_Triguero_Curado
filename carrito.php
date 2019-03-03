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
          <h1>Carrito</h1>
    </div>
  </div>
<?php
if(!isset($_SESSION['cart']) || empty($_SESSION['cart'])){
Echo "<h1 style='color:red'>Tu carrito esta vacío</h1>";

} else {
$items = $_SESSION['cart'];
$cantidad = $_SESSION['cantidad'];
$total=[];
$final=0;
$connection = new mysqli("localhost", "root", "Admin2015", "mercado");
        $connection->set_charset("uft8");
        
        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }
        echo "<table class='table table-hover'>";
        echo "<thead><tr>";
        echo "<th scope='col'>Imagen</th>";              
        echo "<th scope='col'>Descripción</th>";
        echo "<th scope='col'>Cantidad</th>";
        echo "<th scope='col'>Precio</th>";
        echo "<th scope='col'>Total</th>";
        echo "<th scope='col'> </th>";
        echo"</tr></thead>";
for ($i=0;$i<=sizeof($items);$i++) {
  if(isset($items[$i])){
  $query="select * from productos where cod_producto=".$items[$i].";";
        if ($result = $connection->query($query)) {}


          $obj = $result->fetch_object(); 

            echo "<tr>
                  <th scope='row'><img style='height:15%;width15%' class='rounded mx-auto d-block img-fluid' alt='Card image cap' src='data:image/png;base64,".base64_encode($obj->imagen)."'/></th>
                  <td>".$obj->descripcion."</td>";
                  for ($a=0;$a<sizeof($cantidad);$a++) {
                  if($a==$i){
                    echo "<td>".$cantidad[$a]."</td>";
                  $total[$a]=$cantidad[$a]*$obj->precio;
                  echo"<td>".$obj->precio." €</td>";
                  echo"<td>".$total[$a]."€</td>";
                  $final=$final+$total[$a];
                  }
                  }

                  echo"<td> </td>
                  <td><a href='delcar.php?remove=".$i."' id='button' class='btn btn-primary'>Eliminar</a></td>
                  </tr>";
          
}
}
echo "</table>";
echo "<h1>Precio Final= ".$final."€</h1>
<a href='realizar_pedido.php?total=".$final."' id='button' class='btn btn-primary'>Realizar pedido</a>

</form>

";
}
?>