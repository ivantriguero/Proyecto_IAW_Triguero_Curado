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
        $result->close();
        unset($obj);
        unset($connection);
      } elseif ($obj->tipo=="administrador") {
        include 'cabeceraadmi.php';
        $result->close();
        unset($obj);
        unset($connection);
      } }else {
        session_destroy();
        header("Location: index.php");
      };
?>
<div class="row justify-content-center" id="c2" >
    <div class="col-md-6">
          <h1>Proveedores</h1>
    </div>
  </div>
        <div class="container-fluid" style="padding:0px">
        <div class='row justify-content-center'>
        <div class='row'><div class='col-md-7'><h5 style='color:red'>Ten en cuenta que al eliminar un producto se elimina el/los producto asociado a él</h5></div></div>

        <div class="row justify-content-end">
        <div class="col-md-2">
        <a href='administrarproveedores2.php' class='btn btn-primary'>Insertar nuevo proveedor</a><br></div></div>
        <?php
          if (array_key_exists('id1', $_GET)) {
            $connection = new mysqli("localhost", "root", "Admin2015", "mercado");
            $connection->set_charset("uft8");
            $query="delete from proveedores where cod_proveedor=".$_GET["id1"]."";
  
            if ($result = $connection->query($query)) {

                echo "<h3 style='color:green'>Proveedor eliminado correctamente</h3>";
              

              $connection = new mysqli("localhost", "root", "Admin2015", "mercado");
              $connection->set_charset("uft8");
              
              if ($connection->connect_errno) {
                  printf("Connection failed: %s\n", $connection->connect_error);
                  exit();
              }
              
                $query="select * from proveedores;";
      
                if ($result = $connection->query($query)) {}
      
                  echo "<table class='table table-hover'>";
                  echo "<thead><tr>";
                  echo "<th scope='col'>Cod</th>";              
                  echo "<th scope='col'>Nombre</th>";
                  echo "<th scope='col'>telefono</th>";
                  echo "<th scope='col'></th>";
                  echo"</tr></thead>";
              while($obj = $result->fetch_object()) {
                echo "<tr>";
                echo "<form method='post'>";
                echo"<th scope='row'>".$obj->cod_proveedor."</th>";
                echo "<td>$obj->nombre</td>";
                echo "<td>$obj->tlf</td>";
                echo "<td><a href='administrarproveedores1.php?id=".$obj->cod_proveedor."' class='btn btn-primary'><i class='fas fa-pencil-alt'></i></a><a href='administrarproveedores.php?id1=".$obj->cod_proveedor."' class='btn btn-danger'><i class='fas fa-trash-alt'></i></a></td>";
                echo "</form>";
                echo "<tr>
                ";
            }
            echo "</table>";
  
            } else {
  
              echo "error al eliminar proveedor";
  
            }}else {
              if (array_key_exists('editado', $_GET)) {
                echo "<div class='col-md-12'><h3 style='color:green'>Proveedor editado correctamente</h3></div>";
              }
              $connection = new mysqli("localhost", "root", "Admin2015", "mercado");
              $connection->set_charset("uft8");
              
              if ($connection->connect_errno) {
                  printf("Connection failed: %s\n", $connection->connect_error);
                  exit();
              }
              
                $query="select * from proveedores;";
      
              if ($result = $connection->query($query)) {}
                    

                echo "<table class='table table-hover'>";
                    echo "<thead><tr>";
                    echo "<th scope='col'>Cod</th>";              
                    echo "<th scope='col'>Nombre</th>";
                    echo "<th scope='col'>telefono</th>";
                    echo "<th scope='col'></th>";
                    echo"</tr></thead>";
                while($obj = $result->fetch_object()) {
                  echo "<tr>";
                  echo "<form method='post'>";
                  echo"<th scope='row'>".$obj->cod_proveedor."</th>";
                  echo "<td>$obj->nombre</td>";
                  echo "<td>$obj->tlf</td>";
                  echo "<td><a href='administrarproveedores1.php?id=".$obj->cod_proveedor."' class='btn btn-primary'><i class='fas fa-pencil-alt'></i></a><a href='administrarproveedores.php?id1=".$obj->cod_proveedor."' class='btn btn-danger'><i class='fas fa-trash-alt'></i></a></td>";
                  echo "</form>";
                  echo "<tr>
                  ";
              }
              echo "</table>";
  
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