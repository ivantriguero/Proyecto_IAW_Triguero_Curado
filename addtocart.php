<?php

session_start();

    if(isset($_SESSION['cart']) & !empty($_SESSION['cart'])){
        $items = $_SESSION['cart'];
        $cantidad = $_SESSION['cantidad'];
        $items[] = $_GET['id'];
        $cantidad[] = $_POST["cantidad"];
        $_SESSION['cart'] = $items;
        $_SESSION['cantidad'] = $cantidad;
        echo $_POST["cantidad"]."<br>";
        echo $_GET["id"];
        header('location: productos.php?status=success');


    }else{
        $items= [];
        $cantidad= [];
        $items[] = $_GET['id'];
        $cantidad[] = $_POST["cantidad"];
        $_SESSION['cart'] = $items;
        $_SESSION['cantidad'] = $cantidad;
        echo $_POST["cantidad"];    
        header('location: productos.php?status=success');
    }

?>