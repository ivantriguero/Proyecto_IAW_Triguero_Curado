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
    <link rel="stylesheet" type="text/css" href="./css/administrar.css">
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
        include 'cabecera.php';
      };

      ?>
   
   <div class="container-fluid" style="padding:0px">
          <div class="row" style="padding-top:10px">
          <div class="col-md-6">
            <div class="col-md-12">
              <a href="editarclientes.php"><button class="btn-danger btn-block btn-lg" style="height:100px">Administrar Clientes</button></a>
              </div>

              <div class="col-md-12">
                <a href="administrarproductos.php"><button class="btn-danger btn-block btn-lg" style="height:100px">Administrar Productos</button></a>
              </div>


            <div class="col-md-12">
            <a href="#"><button class="btn-danger btn-block btn-lg" style="height:100px">Administrar Pedidos</button></a>
            </div>
          </div>
          <div class="col-md-5 vcenter" id="inf">   
      <?php
      $query="SELECT * from usuarios where email='".$_SESSION["user"]."'";

      if ($result = $connection->query($query)) {

         if ($result->num_rows==0)      {
             echo "ERROR";
         } else {

              echo "<table>";
              while($obj = $result->fetch_object()) {
              echo "<tr><td>Código:</td><td>".$obj->cod_usuario."</td></tr>";
              echo "<tr><td>Nombre:</td><td>".$obj->nombre."</td></tr>";
              echo "<tr><td>Apellidos:</td><td>".$obj->apellidos."</td></tr>";
              echo "<tr><td>Dirección:</td><td>".$obj->direccion."</td></tr>";
              echo "<tr><td>email:</td><td>".$obj->email."</td></tr>";
              echo "<tr><td>Tipo:</td><td>".$obj->tipo."</td></tr>";
              }
              echo "</table>";

              
          }
      } else {
          echo "Error en consulta";
      }

    $result->close();
    unset($obj);
    unset($connection);

?>


              </div>
          </div>
        </div>
      <script>
    $(function() {


    });
</script>
  </body>
</html>