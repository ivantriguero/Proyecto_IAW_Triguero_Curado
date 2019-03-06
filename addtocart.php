<?php

session_start();

    if(isset($_SESSION['cart']) & !empty($_SESSION['cart'])){
        if ($_GET["stock"]>=$_POST["cantidad"]){
            for ($i=0;$i<sizeof($_SESSION['cart']);$i++) {
                if ($_SESSION['cart'][$i]==$_GET["id"]){
                    if($_GET["stock"]>= $_SESSION['cantidad'][$i]+$_POST["cantidad"]){
                    $_SESSION['cantidad'][$i]=$_SESSION['cantidad'][$i]+$_POST["cantidad"];
                    header('location: productos.php?status=success');

                }else{
                    header('location: productos.php?stock=no');
                }
            
            }
               
                }
                if(!in_array($_GET["id"],$_SESSION['cart'])){
                    $_SESSION['cart'][]=$_GET['id'];
                    $_SESSION['cantidad'][]=$_POST["cantidad"];
                    header('location: productos.php?status=success');

            }

    
        }else{
            header('location: productos.php?stock=no');
        }

    }else{
        if ($_GET["stock"]>=$_POST["cantidad"]){
        $items= [];
        $cantidad= [];
        $items[] = $_GET['id'];
        $cantidad[] = $_POST["cantidad"];
        $_SESSION['cart'] = $items;
        $_SESSION['cantidad'] = $cantidad;
        header('location: productos.php?status=success');
    }else{
        header('location: productos.php?stock=no');
    }
    }

?>