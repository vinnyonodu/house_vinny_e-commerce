<?php 
session_start();

session_unset();
session_destroy();


function function_alert($message) {
    
    // Display the alert box 
    echo "<script>alert('$message'); window.location.href='../login.php';</script>";
    exit;
    // header("Location: ../login.php");
}


function_alert("logout successful!");
    
    


