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
        include 'cabecera.php';
      };
?>

        <div class="container-fluid" style="padding:0px">

        <?php
        $connection = new mysqli("localhost", "root", "Admin2015", "mercado");
        $connection->set_charset("uft8");
        
        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }
        
          $query="select * from usuarios where tipo='cliente';";

        if ($result = $connection->query($query)) {}
            if (!isset($_POST["cod"])) {

          while($obj = $result->fetch_object()) {
            echo "<div class='row'>";
            echo "<form method='post'>";
            echo "<input type='hidden' name='cod' value='".$obj->cod_usuario."'>";
            echo "<div class='col-md-2'><input type='text' name='nombre' value='".$obj->nombre."'></div>";
            echo "<div class='col-md-2'><input type='text' name='apellidos' value='".$obj->apellidos."'></div>";
            echo "<div class='col-md-2'><input type='text' name='direccion' value='".$obj->direccion."'></div>";
            echo "<div class='col-md-2'><input type='text' name='email' value='".$obj->email."'></div>";
            echo "<div class='col-md-1'><input type='submit' value='Editar' class='btn btn-danger'></div>";
            echo "</form>";
            echo "<form method='post'>";
            echo "<input type='hidden' name='cod' value='".$obj->cod_usuario."'>";
            echo "<div class='col-md-1'><input type='submit' name='eliminar' value='Eliminar' class='btn btn-danger'></div>";
            echo "</form>";
            echo "</div>";
        }

          }
          echo "</table>";
          if (array_key_exists('cod', $_POST)) {
            if (array_key_exists('eliminar', $_POST)) {
              $query="delete from usuarios where cod_usuario='".$_POST["cod"]."'";
            } else {
              $query="update usuarios set nombre='".$_POST["nombre"]."',apellidos='".$_POST["apellidos"]."',
              direccion='".$_POST["direccion"]."',email='".$_POST["email"]."' WHERE cod_usuario='".$_POST["cod"]."'";
            }
          if ($result = $connection->query($query)) {
            $query="select * from usuarios where tipo='cliente';";

         
        if ($result = $connection->query($query)) {}
          if (array_key_exists('eliminar', $_POST)) {
            echo "<div class='col-md-2'- style='color:red'>cliente eliminado correctamente</div>";
          } else {
          echo "<div class='col-md-2'- style='color:green'>cliente editado correctamente</div>";
          }
          while($obj = $result->fetch_object()) {
  
            echo "<form method='post'>";
            echo "<input type='hidden' name='cod' value='".$obj->cod_usuario."'>";
            echo "<div class='col-md-2'><input type='text' name='nombre' value='".$obj->nombre."'></div>";
            echo "<div class='col-md-2'><input type='text' name='apellidos' value='".$obj->apellidos."'></div>";
            echo "<div class='col-md-2'><input type='text' name='direccion' value='".$obj->direccion."'></div>";
            echo "<div class='col-md-2'><input type='text' name='email' value='".$obj->email."'></div>";
            echo "<div class='col-md-2'><input type='submit' value='Editar' class='btn btn-danger'></div>";
            echo "<form method='post'>";
            echo "<input type='hidden' name='cod' value='".$obj->cod_usuario."'>";
            echo "<div class='col-md-2'><input type='submit' name='eliminar' value='Eliminar' class='btn btn-danger'></div>";
            echo "</form>";
            echo "</form>";
            }

            echo "</tr>";
            echo "</table>";
           
        }

           else {
            echo "Error al actualizar los datos";
          }
        }

        ?>


      </div>
      <script>
    $(function() {


    });
</script>
  </body>
</html>