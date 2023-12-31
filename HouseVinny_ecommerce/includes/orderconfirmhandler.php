<?php 
session_start();
include "dbconnection.php";



$user_id = $_SESSION['id'];
$order_item_list = $_SESSION['cart'];


function function_alert($message) {
    
    // Display the alert box 
    echo "<script>alert('$message'); window.location.href='../cart.php';</script>";
    exit;
    // header("Location: ../login.php");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {


foreach ($order_item_list as $order_item) {
    

    $order_item_quantity = $order_item[3];
    $order_item_item_id = $order_item[2];
    $order_item_user_id = $order_item[1];

    $item_sql = "SELECT * FROM items WHERE items.id = '$order_item_item_id'";
    $add_order_result = mysqli_query($conn, $item_sql);
    $item_row = mysqli_fetch_assoc($add_order_result);
    $item_name = $item_row['title'];
    $item_image = $item_row['image_one'];
    if($item_row['discount_price'] != 0){
        $item_price = $item_row['discount_price'];
    }
    else {
        $item_price = $item_row['price'];
    }

    $add_order_sql =  "INSERT INTO orders (quantity, user_id, item_id, item_title, 	item_image, item_price) 
    VALUES ('$order_item_quantity','$order_item_user_id','$order_item_item_id', '$item_name','$item_image','$item_price')";
    $add_order_result = mysqli_query($conn, $add_order_sql);

    if(isset($user_id)) {
    $delete_cart_sql =  "DELETE FROM cart WHERE cart.user_id='$user_id'";
    $delete_cart_result = mysqli_query($conn, $delete_cart_sql);

    }

}
function_alert("Item(s) ordered successfully. Click OK to go to cart page!");

}

    
    
    






