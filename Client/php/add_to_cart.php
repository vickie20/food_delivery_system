<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Check if form data is received
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['product_id'], $_POST['product_name'], $_POST['price'])) {
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];  // FIXED
        $price = $_POST['price'];
        $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1; // Default to 1 if not provided

        // Check if product already exists in cart
        $found = false;
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['product_id'] == $product_id) {
                $item['quantity'] += $quantity;
                $found = true;
                break;
            }
        }
        unset($item); // Break reference

        // If product not found, add new item
        if (!$found) {
            $_SESSION['cart'][] = [
                'product_id' => $product_id,
                'product_name' => $product_name,
                'price' => $price,
                'quantity' => $quantity
            ];
        }

        // Redirect to cart page
        header("Location: cart.php");
        exit();
    } else {
        die("Error: Missing required fields.");
    }
} else {
    die("Error: Invalid request method.");
}
