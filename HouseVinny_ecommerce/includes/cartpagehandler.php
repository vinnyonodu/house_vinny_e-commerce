<?php 
session_start();
include "dbconnection.php";


$item_id = $_GET['id'];
$user_id = $_SESSION['id'];
$quantity = 1;




// if (isset($_GET['id'])) {
//     $item_id = $_GET['id'];
//     $item_sql = "SELECT * FROM `items` WHERE items.id=$item_id";
//     $result = mysqli_query($conn, $item_sql);
//     $row = mysqli_fetch_assoc($result);

if (isset($_SESSION['id'])) {
        $cart_sql = "SELECT * FROM cart WHERE item_id='$item_id' and user_id='$user_id'";
        $result = mysqli_query($conn, $cart_sql);

        if(mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $quantity_add = $row['quantity'] + 1;
            $new_row_sql = "UPDATE cart SET quantity = '$quantity_add' WHERE item_id='$item_id' and user_id='$user_id'";
            $result_2 = mysqli_query($conn, $new_row_sql);
            header("Location: ../product.php?id=". $item_id);
            exit();
        }
        else { 
            
            $add_cart_sql =  "INSERT INTO cart (user_id, item_id, quantity) 
            VALUES ('$user_id', '$item_id', '$quantity')";
            $add_cart_result = mysqli_query($conn, $add_cart_sql);

            header("Location: ../product.php?id=". $item_id);
            exit();

        }

    }
    
    






