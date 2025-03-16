<?php
session_start();
include 'config/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['place_order'])) {
    if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
        die("Cart is empty. Add items before placing an order.");
    }

    $user_id = $_POST['user_id'];

    // Insert each item into the `orders` table without clearing the cart
    foreach ($_SESSION['cart'] as $item) {
        $product_name = $item['product_name'];
        $quantity = (int)$item['quantity'];
        $total_price = $item['price'] * $quantity;

        $sql = "INSERT INTO orders (user_id, product_name, quantity, total_price) 
                VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isid", $user_id, $product_name, $quantity, $total_price);
        $stmt->execute();
    }

    echo "Order placed successfully! Proceed to payment.";
    header("Location: cart.php"); // Redirects back to cart without clearing it
    exit();
}
?>
