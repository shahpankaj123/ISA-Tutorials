<?php

$conn = mysqli_connect("localhost","root","","signup_db",3306);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Database connected successfully!";

// $host = "127.0.0.1";   
// $user = "root";
// $pass = "Pankaj@123";
// $db   = "signup_db";
// $port = 3306;         

// $conn = new mysqli($host, $user, $pass, $db, $port);

// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// echo "Connected to Brew MySQL successfully";
?>
