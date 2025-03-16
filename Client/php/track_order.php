<?php
session_start();
include 'config/db_connect.php';

// Fetch all orders (no user restriction)
$result = $conn->query("SELECT * FROM orders ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/track_order.css">
    <title>Track Orders</title>
    <div class="navbar">
        <a href="cart.php">Cart</a>
        <a href="track_order.php">Track Order</a>
        <a href="update_profile.php">Settings</a>
        <a href="view_products.php">View</a>
        <a href="../index.php">Logout</a>
    </div>
</head>
<body>
    <h2>All Orders</h2>
    <table border="1">
        <tr>
            <th>Order ID</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Status</th>
            <th>Time Placed</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo htmlspecialchars($row['product_name']); ?></td>
                <td><?php echo $row['quantity']; ?></td>
                <td><?php echo $row['total_price']; ?></td>
                <td><?php echo $row['status'] ?? 'Pending'; ?></td>
                <td><?php echo $row['created_at']; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
