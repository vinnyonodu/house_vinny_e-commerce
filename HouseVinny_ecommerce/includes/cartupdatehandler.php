<?php 
session_start();
include "dbconnection.php";


$item_id = $_GET['id'];
$user_id = $_SESSION['id'];
$quantity = 1;


if (isset($_SESSION['id'])) {
        $cart_sql = "DELETE FROM cart WHERE item_id = '$item_id'";
        $result = mysqli_query($conn, $cart_sql);
        header("Location: ../cart.php");
        exit();

    }
    
    






