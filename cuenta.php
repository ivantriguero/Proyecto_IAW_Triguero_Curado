<?php
session_start();
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
        include 'cabecerasesion.php';

        $connection = new mysqli("localhost", "root", "Admin2015", "mercado");
        $connection->set_charset("uft8");

        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
         }

        $query="SELECT * from usuarios where direccion 
            like '%".$_POST['ciudad']."'";

        if ($result = $connection->query($query)) {

           if ($result->num_rows==0)      {
               echo "Ningún cliente de la ciudad: ".$_POST['ciudad'];
           } else {

                echo "<ul>";
                while($obj = $result->fetch_object()) {
                echo "<li>";
                echo "Codigo:".$obj->CodCliente;
                echo "Nombre: ".$obj->Nombre;
                echo "Apellidos".$obj->Apellidos;
                echo "DNI: ".$obj->DNI;
                echo "Direccion: ".$obj->Direccion;
                echo "Teléfono".$obj->Telefono;
                echo "</li>";
                }
                echo "</ul>";

                
            }
        } else {
            echo "Error en consulta";
        }

      $result->close();
      unset($obj);
      unset($connection);
?>

<div class="row">
      <div class="col-md-6">
      
      </div>
</div>

        
      </div>

  </body>
</html>