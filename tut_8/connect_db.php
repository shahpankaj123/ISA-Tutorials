<?php
$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "signup_db",
    3306
);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Database connected successfully!";
?>
