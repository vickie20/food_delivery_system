<?php
session_start();
include 'config/db_connect.php';
require '../../vendor/autoload.php'; // Stripe library

\Stripe\Stripe::setApiKey('sk_test_51NDk0JK6WtbuHR5ajbyUWanI8zMj5BQd5I6VMtkXbie1MeVZplVmj7ug7ubX8SBCWpkNr8D7qb6d2pxnaKtc0gTi00SdycxPwz');

// Retrieve session ID from the session
if (!isset($_SESSION['checkout_session_id'])) {
    die('Payment not verified.');
}

$checkout_session_id = $_SESSION['checkout_session_id'];

// Verify payment with Stripe
try {
    $session = \Stripe\Checkout\Session::retrieve($checkout_session_id);
} catch (Exception $e) {
    die('Invalid session.');
}

if ($session->payment_status === 'paid') {
    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            $user_id = $_SESSION['user_id']; // Assuming user is logged in
            $product_name = $item['product_id']; 
            $quantity = 1; // Default quantity
            $total_price = $item['price'];

            $insert_order = "INSERT INTO orders (user_id, product_name, quantity, total_price) 
                             VALUES ('$user_id', '$product_name', '$quantity', '$total_price')";
            $conn->query($insert_order);
        }
        // Clear cart after successful insertion
        unset($_SESSION['cart']);
        unset($_SESSION['checkout_session_id']);
    }
    echo "Payment successful. Your order has been placed!";
} else {
    echo "Payment failed!";
}
?>
