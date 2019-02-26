<?php

session_start();
if(isset($_GET['remove']) ){
    $delitems=$_SESSION['cart'];
    unset($delitem[$_GET['remove']]);
    $_SESSION=$delitem;
    header('location: carrito.php');
}

?>