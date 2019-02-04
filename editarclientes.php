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
        <div class="row justify-content-center">
        <?php
        $connection = new mysqli("localhost", "root", "Admin2015", "mercado");
        $connection->set_charset("uft8");
        
        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }
        
          $query="select * from usuarios where tipo='cliente';";
          echo "<table>";
        if ($result = $connection->query($query)) {}
            if (!isset($_POST["cod"])) {
            echo "<table>";
            echo "<th>Nombre</th><th>Apellidos</th><th>Dirección</th><th>email</th>";
          while($obj = $result->fetch_object()) {
            echo "<tr>";
            echo "<form method='post'>";
            echo "<input type='hidden' name='cod' value='".$obj->cod_usuario."'>";
            echo "<td><input type='text' name='nombre' value='".$obj->nombre."'></td>";
            echo "<td><input type='text' name='apellidos' value='".$obj->apellidos."'></td>";
            echo "<td><input type='text' name='direccion' value='".$obj->direccion."'></td>";
            echo "<td><input type='text' name='email' value='".$obj->email."'></td>";
            echo "<td><input type='submit' value='Editar' class='btn btn-danger'></td>";
            echo "</form>";
        }
            echo "</tr>";
          }
          echo "</table>";
          if (array_key_exists('cod', $_POST)) {
              $query="update usuarios set nombre='".$_POST["nombre"]."',apellidos='".$_POST["apellidos"]."',
              direccion='".$_POST["direccion"]."',email='".$_POST["email"]."' WHERE cod_usuario='".$_POST["cod"]."'";
            
          if ($result = $connection->query($query)) {
            $query="select * from usuarios where tipo='cliente';";

         
        if ($result = $connection->query($query)) {}
            echo "<table>";
            echo "<th>Nombre</th><th>Apellidos</th><th>Dirección</th><th>email</th>";
          while($obj = $result->fetch_object()) {
            echo "<tr>";
            echo "<input type='hidden' name='cod' value='".$obj->cod_usuario."'>";
            echo "<td><input type='text' name='desc' value='".$obj->nombre."'></td>";
            echo "<td><input type='text' name='stock' value='".$obj->apellidos."'></td>";
            echo "<td><input type='text' name='precio' value='".$obj->direccion."'></td>";
            echo "<td><input type='text' name='precio' value='".$obj->email."'></td>";
            echo "<td><input type='submit' value='Editar' class='btn btn-danger'></td>";
            }
            echo "<td style='color:green'>cliente editado correctamente</td>";
            
            echo "</tr>";
            echo "</table>";
           
        }

           else {
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