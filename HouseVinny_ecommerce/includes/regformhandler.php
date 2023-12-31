<?php
session_start();
include "dbconnection.php";


function function_alert($message) {
    
    // Display the alert box 
    echo "<script>alert('$message'); window.location.href='../login.php';</script>";
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    function cleanData($data_value) {
        $data_value = trim($data_value);
        $data_value = stripslashes($data_value);
        $data_value = htmlspecialchars($data_value);
        return $data_value;
    }



    $first_name = cleanData($_POST["first_name"]);
    $last_name = cleanData($_POST["last_name"]);
    $email_address = cleanData($_POST["email_address"]);
    $password = cleanData($_POST["password"]);
    $confirm_password = cleanData($_POST["confirm_password"]);
    $phone_number = cleanData($_POST["phone_number"]);
    $address = cleanData($_POST["address"]);
    $password_encrypt = password_hash($password, PASSWORD_DEFAULT);


    echo $first_name;
    echo $last_name;
    echo $email_address;
    echo $password;
    echo $confirm_password;
    echo $phone_number;
    echo $address;


    if(empty($first_name)) {
        header("Location: ../register.php?error=first name is required");
        exit();
    }
    else if(empty($last_name)) {
        header("Location: ../register.php?error=Last name is required");
        exit();
    }
    else if (!preg_match("/^[a-zA-Z]*$/", $first_name) || !preg_match("/^[a-zA-Z]*$/", $last_name)) {
        header("Location: ../register.php?error=Valid name required (letters only!)");
        exit();
    } 
    else if(empty($email_address)) {
        header("Location: ../register.php?error=Email address is required");
        exit();
    }
    else if(!filter_var($email_address, FILTER_VALIDATE_EMAIL))  {
        header("Location: ../register.php?error=Provide a valid email address");
        exit();
    }
    else if(empty($password)) {
        header("Location: ../register.php?error=Password is required");
        exit();
    }
    else if(empty($confirm_password)) {
        header("Location: ../register.php?error=Confirm Password is required");
        exit();
    }
    else if ($password != $confirm_password) {
        header("Location: ../register.php?error=Password do not match");
        exit();
    }
    else {
        $reg_sql = "SELECT * FROM users WHERE email_address='$email_address'";
        $result = mysqli_query($conn, $reg_sql);

        if(mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['email_address'] === $email_address) {
                header("Location: ../register.php?error=User already exists in the system.");
                exit();
            }
        }
        else {
            $add_user = "INSERT INTO users (first_name, last_name, email_address, password, phone_number, address) 
            VALUES ('$first_name', '$last_name', '$email_address', '$password_encrypt', $phone_number, '$address')";
            $result2 = mysqli_query($conn, $add_user);

            function_alert("Registration successful. Click OK to go to Login page!");
            //header("Location: ../index-3.php");
            exit();
        }
    }
    
}


// else{
//     header("Location: index-3.php");
//     exit();
// }

    