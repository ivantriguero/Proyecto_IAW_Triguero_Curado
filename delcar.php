<?php

session_start();
if(isset($_GET['remove']) ){
    $delitems=$_SESSION['cart'];
    $delcantidad=$_SESSION['cantidad'];
    unset($delitems[$_GET['remove']]);
    unset($delcantidad[$_GET['remove']]);
    $delitems=array_values($delitems);
    $delcantidad=array_values($delcantidad);
    $_SESSION['cart']=$delitems;
    $_SESSION['cantidad']=$delcantidad;
    header('location: carrito.php');

}

?>