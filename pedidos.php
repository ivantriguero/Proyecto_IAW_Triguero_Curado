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
          <h1>Pedidos</h1>
    </div>
  </div>
  <a class='b1 btn btn-outline-danger' href='cuenta.php'><i class='fas fa-arrow-left'></i></a>

        <div class="container-fluid" style="padding:0px">
        <div class='row justify-content-center'>
        
        <?php

if (array_key_exists('id1', $_GET)) {

    $connection = new mysqli("localhost", "root", "Admin2015", "mercado");
    $connection->set_charset("uft8");
    
    if ($connection->connect_errno) {
        printf("Connection failed: %s\n", $connection->connect_error);
        exit();
    }
    
      $query="delete from pedidos where cod_pedido=".$_GET['id1'].";";
    Echo "<h1 style='color:green'>Pedido cancelado correctamente</h1>";
 
    if ($result = $connection->query($query)) {}
        }else{

              $connection = new mysqli("localhost", "root", "Admin2015", "mercado");
              $connection->set_charset("uft8");
              
              if ($connection->connect_errno) {
                  printf("Connection failed: %s\n", $connection->connect_error);
                  exit();
              }
              
                $query="select * from pedidos where cod_usuario=".$_GET['id'].";";
      
              if ($result = $connection->query($query)) {}
      
                    echo "<table class='table table-hover'>";
                    echo "<thead><tr>";
                    echo "<th scope='col'>Cod_pedido</th>";              
                    echo "<th scope='col'>Fecha</th>";
                    echo "<th scope='col'>Cod_usuario</th>";
                    echo "<th scope='col'>Precio</th>";
                    echo "<th scope='col'>Productos</th>";
                    echo "<th scope='col'></th>";
                    echo"</tr></thead>";
                while($obj = $result->fetch_object()) {
                  echo "<tr>";
                  echo "<form method='post'>";
                  echo"<th scope='row'>".$obj->cod_pedido."</th>";
                  echo "<td>".$obj->fecha."</td>";
                  echo "<td>".$obj->cod_usuario."</td>";
                  echo "<td>".$obj->precio." €</td>";
                  echo "<td>".$obj->productos."</td>";
                  echo "<td><a href='pedidos.php?id1=".$obj->cod_pedido."' class='btn btn-primary'>Pedido realizado</a></td>";
                  echo "</form>";
                  echo "<tr>
                  ";
              

            }}
        ?>

        </div>
      </div>
      <script>
    $(function() {


    });
</script>
  </body>
</html>