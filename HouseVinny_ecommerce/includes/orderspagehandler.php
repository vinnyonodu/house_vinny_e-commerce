<?php 
session_start();
include "dbconnection.php";



$user_id = $_SESSION['id'];
$order_item_list = $_SESSION['cart'];



if ($_SERVER["REQUEST_METHOD"] == "POST") {


foreach ($order_item_list as $order_item) {
    

    $order_item_quantity = $order_item[3];
    $order_item_item_id = $order_item[2];
    $order_item_user_id = $order_item[1];

    $add_order_sql =  "INSERT INTO orders (quantity, user_id, item_id) 
    VALUES ('$order_item_quantity','$order_item_user_id','$order_item_item_id')";
    $add_order_result = mysqli_query($conn, $add_order_sql);

    

}
function_alert("Item(s) ordered successfully. Click OK to go to home page!");

}

    
    
    






