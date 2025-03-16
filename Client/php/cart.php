<?php
session_start();
include 'config/db_connect.php';

if (!isset($_SESSION['user_id'])) {
    die("You must be logged in to place an order.");
}

$user_id = $_SESSION['user_id']; // Assuming user is logged in
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cart.css">
   
    <title>Shopping Cart</title>
    <div class="navbar">
        <a href="cart.php">Cart</a>
        <a href="track_order.php">Track Order</a>
        <a href="update_profile.php">Settings</a>
        <a href="view_products.php">View</a>
        <a href="../index.php">Logout</a>
    </div>
</head>
<body>
    <h2>Your Cart</h2>
    <table border="1">
        <tr>
            <th>#</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
        <?php
        if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
            echo "<tr><td colspan='6'>Your cart is empty.</td></tr>";
            $total_price = 0;
        } else {
            $count = 1;
            $total_price = 0;
            foreach ($_SESSION['cart'] as $key => $item) {
                $product_name = htmlspecialchars($item['product_name']);
                $quantity = (int)$item['quantity'];
                $price = (float)$item['price'];
                $total = $price * $quantity;
                $total_price += $total;
        ?>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td><?php echo $product_name; ?></td>
                    <td><?php echo $quantity; ?></td>
                    <td>KSh <?php echo number_format($price, 2); ?></td>
                    <td>KSh <?php echo number_format($total, 2); ?></td>
                    <td>
                        <form action="remove_from_cart.php" method="POST">
                            <input type="hidden" name="key" value="<?php echo $key; ?>">
                            <button type="submit">Remove</button>
                        </form>
                    </td>
                </tr>
        <?php
            }
            echo "<tr><td colspan='4'><strong>Total Price:</strong></td><td><strong>KSh " . number_format($total_price, 2) . "</strong></td><td></td></tr>";
        }
        ?>
    </table>

    <!-- Order Button -->
    <form action="place_order.php" method="POST">
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
        <button type="submit" name="place_order">Place Order</button>
    </form>

    <!-- Checkout Button (Now Passing Total Price) -->
    <form action="checkout.php" method="POST">
        <input type="hidden" name="total_price" value="<?php echo $total_price; ?>">
        <button type="submit">Proceed to Checkout</button>
    </form>
</body>
</html>
