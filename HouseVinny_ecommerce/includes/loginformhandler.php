<?php
session_start();
include "dbconnection.php";



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    function cleanData($data_value) {
        $data_value = trim($data_value);
        $data_value = stripslashes($data_value);
        $data_value = htmlspecialchars($data_value);
        return $data_value;
    }


    $email_address = cleanData($_POST["email_address"]);
    $password = cleanData($_POST["password"]);

    echo $email_address;
    echo $password;


    if(empty($email_address)) {
        header("Location: ../login.php?error=Email address is required");
        exit();
    }
    else if(!filter_var($email_address, FILTER_VALIDATE_EMAIL))  {
        header("Location: ../login.php?error=Provide a valid email address");
        exit();
    }
    else if(empty($password)) {
        header("Location: ../login.php?error=Password is required");
        exit();
    }
    else {
        $login_sql = "SELECT * FROM users WHERE email_address='$email_address'";
        $result = mysqli_query($conn, $login_sql);

        if(mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password, $row['password'])) {
                if ($row['email_address'] === $email_address) {
                    $_SESSION['email_address'] = $row['email_address'];
                    $_SESSION['first_name'] = $row['first_name'];
                    $_SESSION['id'] = $row['id'];
                    header("Location: ../index-3.php");
                    exit();
                }
            }
            else {
                header("Location: ../login.php?error=Incorect User name or password");
                exit();
            }
        }
        else{
            header("Location: ../login.php?error=Incorect User name or password");
            exit();
        }

    }
}


// else{
//     header("Location: index-3.php");
//     exit();
// }

    