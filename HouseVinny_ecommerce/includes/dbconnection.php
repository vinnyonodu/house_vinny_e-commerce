<?php


$host= "localhost"; //host
$username= "root";  //user
$password = "";  //password

$db_name = "house_vinny"; //database name

$conn = mysqli_connect($host, $username, $password, $db_name); //connection to database

if (!$conn) {
    echo "Connection failed!";
}

