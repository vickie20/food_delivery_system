<?php
session_start();
include 'config/db_connect.php';

// Fetch all orders with user details
$result = $conn->query("SELECT o.*, u.username, u.phone_number FROM orders o 
                        JOIN users u ON o.user_id = u.id ORDER BY o.created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin_order.css">
    <title>Manage Orders</title>
    <div class="navbar">
    <a href="admin_users.php">Users</a>
    <a href="admin_orders.php">Orders</a>
    <a href="view_products.php">View</a>
    <a href="add_product.php">Add Product</a>

    <a href="../index.php">Logout</a>
</div>
</head>
<body>
    <h2>Orders Management</h2>
    <table border="1">
        <tr>
            <th>Order ID</th>
            <th>User</th>
            <th>Phone Number</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo htmlspecialchars($row['username']); ?></td>
                <td><?php echo htmlspecialchars($row['phone_number'] ?? 'Not Available'); ?></td>
                <td><?php echo htmlspecialchars($row['product_name']); ?></td>
                <td><?php echo $row['quantity']; ?></td>
                <td><?php echo $row['total_price']; ?></td>
                <td><?php echo $row['status'] ?? 'Pending'; ?></td>
                <td>
                    <form method="POST" action="update_order_status.php">
                        <input type="hidden" name="order_id" value="<?php echo $row['id']; ?>">
                        <select name="status">
                            <option value="Pending">Pending</option>
                            <option value="Processing">Processing</option>
                            <option value="Out for Delivery">Out for Delivery</option>
                            <option value="Delivered">Delivered</option>
                        </select>
                        <button type="submit">Update</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
