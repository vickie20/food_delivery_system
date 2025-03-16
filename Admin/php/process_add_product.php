<?php
include 'config/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    
    // Image handling
    $image = $_FILES['image']['tmp_name'];
    $imgContent = file_get_contents($image);

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO products (name, description, price, image) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssds", $name, $description, $price, $imgContent);

    if ($stmt->execute()) {
        echo "Product added successfully!";
        header("Location: view_products.php");
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
