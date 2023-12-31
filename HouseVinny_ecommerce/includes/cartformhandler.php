<?php 
session_start();
include "dbconnection.php";


$item_id = $_GET['id'];
$user_id = $_SESSION['id'];

function function_alert($message) {
    
    // Display the alert box 
    echo "<script>alert('$message'); window.location.href='../index-3.php';</script>";
    exit;
    // header("Location: ../login.php");
}
function function_alert_two($message) {
    
    // Display the alert box 
    echo "<script>alert('$message'); window.location.href='../login.php';</script>";
    exit;
    // header("Location: ../login.php");
}



// if (isset($_GET['id'])) {
//     $item_id = $_GET['id'];
//     $item_sql = "SELECT * FROM `items` WHERE items.id=$item_id";
//     $result = mysqli_query($conn, $item_sql);
//     $row = mysqli_fetch_assoc($result);

if (isset($_SESSION['id']) and $_SERVER["REQUEST_METHOD"] == "POST") {

    function cleanData($data_value) {
        $data_value = trim($data_value);
        $data_value = stripslashes($data_value);
        $data_value = htmlspecialchars($data_value);
        return $data_value;
    }

    $quantity = cleanData($_POST["quantity"]);

    $cart_sql = "SELECT * FROM cart WHERE item_id='$item_id' and user_id='$user_id'";
    $result = mysqli_query($conn, $cart_sql);

    if(mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $quantity_add = $row['quantity'] + $quantity;
        $new_row_sql = "UPDATE cart SET quantity = '$quantity_add' WHERE item_id='$item_id' and user_id='$user_id'";
        $result_2 = mysqli_query($conn, $new_row_sql);
        //header("Location: ../product.php?id=". $item_id);
        function_alert("Item added to cart, clcik ok to continue shopping!");
        exit();
    }
    else { 
        
        $add_cart_sql =  "INSERT INTO cart (user_id, item_id, quantity) 
        VALUES ('$user_id', '$item_id', '$quantity')";
        $add_cart_result = mysqli_query($conn, $add_cart_sql);

        //header("Location: ../product.php?id=". $item_id);
        function_alert("Item added to cart, click ok to continue shopping!");
        exit();

    }

    }
else {

    function_alert_two("Please, Login to add item to cart. click OK to go to Login page!");
    exit();
}
    
    






