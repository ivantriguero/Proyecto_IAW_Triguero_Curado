<?php
var_dump($_GET);
session_start();

    if(isset($_SESSION['cart']) & !empty($_SESSION['cart'])){
        $items = $_SESSION['cart'];
        $items[] = $_GET['id'];
        $_SESSION['cart'] = $items;
        header('location: productos.php?status=success');

    }else{
        $items= [];
        $items[] = $_GET['id'];
        $_SESSION['cart'] = $items;
        header('location: productos.php?status=success');
    }
    
?>