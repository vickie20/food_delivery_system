<?php
session_start();
require '../../vendor/autoload.php'; // Stripe library
include 'config/db_connect.php';

// Stripe API Key
\Stripe\Stripe::setApiKey('sk_test_51NDk0JK6WtbuHR5ajbyUWanI8zMj5BQd5I6VMtkXbie1MeVZplVmj7ug7ubX8SBCWpkNr8D7qb6d2pxnaKtc0gTi00SdycxPwz');

if (empty($_SESSION['cart'])) {
    die('Your cart is empty.');
}

$line_items = [];
$total_price = 0;

foreach ($_SESSION['cart'] as $item) {
    $quantity = isset($item['quantity']) ? (int)$item['quantity'] : 1;
    $price = (float)$item['price'];
    $subtotal = $price * $quantity; // Calculate total for each item
    $total_price += $subtotal;

    $line_items[] = [
        'price_data' => [
            'currency' => 'usd',
            'product_data' => [
                'name' => htmlspecialchars($item['product_name']),
            ],
            'unit_amount' => $price * 100, // Convert to cents
        ],
        'quantity' => $quantity,
    ];
}

// Create Stripe Checkout Session
$checkout_session = \Stripe\Checkout\Session::create([
    'payment_method_types' => ['card'],
    'line_items' => $line_items,
    'mode' => 'payment',
    'success_url' => 'http://localhost/Food_delivery_system/Client/success.php',
    'cancel_url' => 'http://localhost/Food_delivery_system/Client/cart.php',
]);

// Store session ID to verify payment after success
$_SESSION['checkout_session_id'] = $checkout_session->id;

// Redirect to Stripe's checkout page
header("Location: " . $checkout_session->url);
exit();
