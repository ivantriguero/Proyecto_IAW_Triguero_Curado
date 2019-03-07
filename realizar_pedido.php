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
    } elseif ($obj->tipo=="administrador") {
      include 'cabeceraadmi.php';
    } }else {
      session_destroy();
      header("Location: index.php");
    };

?>
<div class="row justify-content-center" id="c2" >
    <div class="col-md-6">
          <h1>Carrito</h1>
    </div>
  </div>
<?php
if (isset($_SESSION["user"])) {
    $productos="";
    $items = $_SESSION['cart'];
    $cantidad = $_SESSION['cantidad'];
    for ($i=0;$i<sizeof($items);$i++) {
        $productos=$productos." ". +$items[$i]."(".$cantidad[$i].")";
    }
$connection = new mysqli("localhost", "root", "Admin2015", "mercado");
$connection->set_charset("uft8");

if ($connection->connect_errno) {
    printf("Connection failed: %s\n", $connection->connect_error);
    exit();
}

  $query="select cod_usuario from usuarios where
  email='".$_SESSION["user"]."';";
if ($result = $connection->query($query)) {}
    $obj = $result->fetch_object();
$cod= $obj->cod_usuario;
  

  $query="insert into pedidos(fecha,cod_usuario,precio,productos) values (curdate(),".$cod.",".$_GET['total'].",'".$productos."')";
if ($result = $connection->query($query)) {}
  $cantidad=$_SESSION["cantidad"];
  $cart=$_SESSION["cart"];
  for ($i=0;$i<sizeof($cart);$i++) {
  $query="update productos set stock=stock-".$cantidad[$i]." where cod_producto=".$cart[$i]."";
  if ($result = $connection->query($query)) {}
  }
$_SESSION["cart"]=[];
$_SESSION['cantidad']=[];
 echo "<h1>Pedido realizado correctamente</h1>
 <a class='b1 btn btn-outline-danger' href='index.php'><h3>Volver a inicio</h3></a>
 ";}else{
     echo "<h1>Para realizar el pedido es necesario registrarse</h1>
     <a href='registro.php'><h3>Registrarse</h3></a>
     ";
 }

?>