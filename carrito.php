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

<?php
session_start();
$items = $_SESSION['cart'];
$connection = new mysqli("localhost", "root", "Admin2015", "mercado");
        $connection->set_charset("uft8");
        
        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }

for ($i=0;$i<sizeof($items);$i++) {
  if(isset($items[$i])){
  $query="select * from productos where cod_producto=".$items[$i].";";
        if ($result = $connection->query($query)) {}


          $obj = $result->fetch_object(); 
            echo "<div class='col-md-2'>";
            echo "<div class='card'>";
            echo "<div class='d-flex align-items-center' style='witdh:220px;height:270px'><img class='rounded mx-auto d-block img-fluid' alt='Card image cap' src='data:image/png;base64,".base64_encode($obj->imagen)."'/></div>";
            echo "<div class='card-body'>";
            echo "<h3 class='card-title'>".$obj->descripcion."</h3>";
            echo "Cantidad: ".$obj->stock."<br>";
            echo "Precio Total: ".$obj->precio."€<br>";
            echo "<a href='delcar.php?remove=".$i."' id='button' class='btn btn-primary'>Eliminar</a>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
          
}else{
$i=$i+1;
$query="select * from productos where cod_producto=".$items[$i].";";
        if ($result = $connection->query($query)) {}


          $obj = $result->fetch_object(); 
            echo "<div class='col-md-2'>";
            echo "<div class='card'>";
            echo "<div class='d-flex align-items-center' style='witdh:220px;height:270px'><img class='rounded mx-auto d-block img-fluid' alt='Card image cap' src='data:image/png;base64,".base64_encode($obj->imagen)."'/></div>";
            echo "<div class='card-body'>";
            echo "<h3 class='card-title'>".$obj->descripcion."</h3>";
            echo "Cantidad: ".$obj->stock."<br>";
            echo "Precio Total: ".$obj->precio."€<br>";
            echo "<a href='delcar.php?remove=".$i."' id='button' class='btn btn-primary'>Eliminar</a>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
}

}
?>