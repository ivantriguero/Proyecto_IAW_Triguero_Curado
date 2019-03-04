<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MercaPalacio</title>
    <link rel="shortcut icon" href="./imagenes/logo1.png" />
    <link rel="stylesheet" type="text/css" href="./css/registro.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style>
      span {
        width: 100px;
        display: inline-block;
      }
    </style>
  </head>
  <body>
<div class="row justify-content-center">
      <div id="form" class="col-md-12">
      <?php if (!isset($_POST["desc"])) : ?>
        <form method="post" enctype="multipart/form-data">
          <fieldset>
            <legend style="color:white">- Registrar Producto -</legend>
            <span style='color:white'>Descripción:</span><input type="text" name="desc" required><br>
            <span style='color:white'>Precio:</span><input type="number" name="price" required><br>
            <span style='color:white'>Imagen:</span><input style="color:white" type="file" name="imagen" required><br>
            <span style='color:white'>Stock:</span><input type="number" name="stock" required><br>
            <span style='color:white'>Proveedor:</span>
            <select name="proveedor">
            <?php 
  $connection = new mysqli("localhost", "root", "Admin2015", "mercado",3316);
  $connection->set_charset("uft8");

  if ($connection->connect_errno) {
      printf("Connection failed: %s\n", $connection->connect_error);
      exit();
  }


  $query = "select * from proveedores";
  if ($result = $connection->query($query)) {}
    while($obj = $result->fetch_object()) {

            echo"<option value='".$obj->cod_proveedor."' required>".$obj->nombre."</option>";
            
    }
            ?>
            </select>


            <br>
            <p><input type="submit" value="Crear"></p>
          </fieldset>
        </form>

      <?php else: ?>

        <?php


        $connection = new mysqli("localhost", "root", "Admin2015", "mercado",3316);
        $connection->set_charset("uft8");

        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }
        $desc = $_POST["desc"];
        $price = $_POST["price"];
        $file = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
        $stock = $_POST["stock"];
        $proveedor = $_POST["proveedor"];


        $query = "select * from productos where descripcion='".$desc."'";
        if ($result = $connection->query($query)) {}
        $obj = $result->fetch_object();
        if ($result->num_rows==0) {
        $query = "INSERT INTO productos (descripcion,precio,cod_proveedor,imagen,stock)
        VALUES ('$desc','$price','$proveedor','$file','$stock')";


        if ($connection->query($query)) {

        
        

        } else {
          echo "ERROR al crear Productos";
        }
      $query="SELECT * from productos where descripcion='".$desc."';";

      if ($result = $connection->query($query)) {

         if ($result->num_rows==0)      {
             echo "ERROR";
         } else {
           $obj = $result->fetch_object();
           echo"<?php if (!isset(".$_POST['desc'].")) : ?>
           <form method='post' enctype='multipart/form-data'>
             <fieldset>
               <legend style='color:white'>- Registrar Producto -</legend>
               <span style='color:white'>Descripción:</span><input type='text' name='desc' required><br>
               <span style='color:white'>Precio:</span><input type='number' name='price' required><br>
               <span style='color:white'>Imagen:</span><input style='color:white' type='file' name='imagen' required><br>
               <span style='color:white'>Stock:</span><input type='number' name='stock' required><br>
               <br>
               <select name='proveedor'>";
               
     $connection = new mysqli("localhost", "root", "Admin2015", "mercado",3316);
     $connection->set_charset("uft8");
   
     if ($connection->connect_errno) {
         printf("Connection failed: %s\n", $connection->connect_error);
         exit();
     }
   
   
     $query = "select * from proveedores";
     if ($result = $connection->query($query)) {}
       while($obj = $result->fetch_object()) {
   
               echo"<option value='".$obj->cod_proveedor."' required>".$obj->nombre."</option>";
               
       }
               
              echo" </select>
               <p><input type='submit' value='Crear'></p>
             </fieldset>
           </form>";
           echo "<p style='color:green;background-color:black'>Producto insertado correctamente</p>"; 
           echo" <script>
           $(function() {
           $('#myCollapsible').collapse({
            show: true
          })
       
           });
       </script>";     
          }
      } else {
          echo "Error en consulta";
      }
 } else {
    echo"<?php if (!isset(".$_POST['desc'].")) : ?>
    <form method='post' enctype='multipart/form-data'>
      <fieldset>
        <legend style='color:white'>- Registrar Producto -</legend>
        <span style='color:white'>Descripción:</span><input type='text' name='desc' required><br>
        <span style='color:white'>Precio:</span><input type='number' name='price' value='".$price."' required><br>
        <span style='color:white'>Imagen:</span><input style='color:white' type='file' name='imagen' required><br>
        <span style='color:white'>Stock:</span><input type='number' name='stock' value='".$stock."' required><br>
        <br>
        <select name='proveedor'>";
               
     $connection = new mysqli("localhost", "root", "Admin2015", "mercado",3316);
     $connection->set_charset("uft8");
   
     if ($connection->connect_errno) {
         printf("Connection failed: %s\n", $connection->connect_error);
         exit();
     }
   
   
     $query = "select * from proveedores";
     if ($result = $connection->query($query)) {}
       while($obj = $result->fetch_object()) {
   
               echo"<option value='".$obj->cod_proveedor."' required>".$obj->nombre."</option>";
               
       }
               
              echo" </select>
        <p><input type='submit' value='Crear'></p>
      </fieldset>
    </form>";
     echo "<p style='color:red;background-color:black'>Esa Descripción ya existe</p>";
    echo" <script>
     $(function() {
     $('#myCollapsible').collapse({
      show: true
    })
 
     });
 </script>";
 }
        ?>

      <?php endif ?>
      </div>
</div>


</div>
          

  </body>
</html>