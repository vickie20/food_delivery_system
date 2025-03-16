<?php
$host = "localhost"; 
$user = "root"; // Default XAMPP user
$password = ""; // Default XAMPP password
$dbname = "adan_food_db";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
