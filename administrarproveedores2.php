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
        header('Location: index.php');
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
          <h1>Clientes</h1>
    </div>
  </div>
  <div class='row justify-content-center'>
            <div class='col-md-5'>
            <form method='post'>
            <div class='form-group'>
            <div class='row'>
              <div class='col'>
              <label>Nombre</label>
                <input type='text' name='nombre' class='form-control' required>
              </div>
              <div class='col'>
              <label>Teléfono</label>
                <input type='number' name='tlf' class='form-control' required>
                <input type='hidden' name='cod' value='".$obj->cod_proveedor."'>
              </div>
            </div>
            </div>
            <button type='submit' class='btn btn-primary'>Insertar</button>
          </form>
          </div>
          </div>
        <?php
                  if (array_key_exists('nombre', $_POST)) {

        $connection = new mysqli("localhost", "root", "Admin2015", "mercado");
        $connection->set_charset("uft8");
        
              $nombre=$_POST["nombre"];
              $cod=$_POST["cod"];
            $query = "select * from proveedores where nombre='".$nombre."' AND cod_proveedor!='".$cod."'";
        if ($result = $connection->query($query)) {}
        $obj = $result->fetch_object();
        if ($result->num_rows==0) {
          $query="insert into proveedores(nombre,tlf) values('".$nombre."',".$_POST["tlf"].")";

          if ($result = $connection->query($query)) {
            echo "cliente insertado correctament";
          }else{
              echo "ERROR";
          }
        } else {

            $query="select * from proveedores where cod_proveedor='".$cod."';";


          if ($result = $connection->query($query)) {}
            while($obj = $result->fetch_object()) {
  
              echo "
              <table class='table table-hover'>
              <thead><tr>
              <th scope='col'>Cod</th>            
              <th scope='col'>Nombre</th>
              <th scope='col'>teléfono</th>
              </tr></thead>
            <tr>
            <th scope='row'>".$obj->cod_proveedor."</th>
            <td>$obj->nombre</td>
            <td>$obj->tlf</td>
            <tr>
            ";
            $cod=$obj->cod_proveedor;
            echo "<div class='row justify-content-center'>
            <div class='col-md-5'>
            <form method='post'>
            <div class='form-group'>
            <div class='row'>
              <div class='col'>
              <label>Nombre</label>
                <input type='text' name='nombre' class='form-control' value='".$obj->nombre."' required>
              </div>
              <div class='col'>
              <label>Teléfono</label>
                <input type='number' name='tlf' class='form-control' value='".$obj->tlf."' required>
                <input type='hidden' name='cod' value='".$obj->cod_proveedor."'>
              </div>
            </div>
            </div>
            <button type='submit' class='btn btn-primary'>Editar</button>
          </form>
          <h4 style='color:red'>Este proveedor ya está en uso</h4>
          </div>
          </div>";
          }
            
        }


          }
          
        
        ?>



      <script>
    $(function() {


    });
</script>
  </body>
</html>

       