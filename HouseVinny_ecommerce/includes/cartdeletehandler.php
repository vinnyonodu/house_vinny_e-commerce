<?php 
session_start();
include "dbconnection.php";


$item_id = $_GET['id'];
$user_id = $_SESSION['id'];
$quantity = 1;


function function_alert($message) {
    
    // Display the alert box 
    echo "<script>alert('$message'); window.location.href='../cart.php';</script>";
    exit;
    // header("Location: ../login.php");
}

if (isset($_SESSION['id'])) {
        $cart_sql = "DELETE FROM cart WHERE item_id = '$item_id'";
        $result = mysqli_query($conn, $cart_sql);
        function_alert("Item deleted from cart list, clcik ok to go to Cart page!");
        //header("Location: ../cart.php");
        exit();

    }
    
    






