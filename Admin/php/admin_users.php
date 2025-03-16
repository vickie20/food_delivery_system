<?php
session_start();
include 'config/db_connect.php';

// Fetch all users from the database
$result = $conn->query("SELECT id, username, email, phone_number FROM users");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin_users.css">
    <title>All Users</title>
    <div class="navbar">
    <a href="admin_users.php">Users</a>
    <a href="admin_orders.php">Orders</a>
    <a href="view_products.php">View</a>
    <a href="add_product.php">Add Product</a>

    <a href="../index.php">Logout</a>
</div>
</head>
<body>
    <h2>All Registered Users</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Phone Number</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo htmlspecialchars($row['username']); ?></td>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
                <td><?php echo htmlspecialchars($row['phone_number'] ?? 'Not Provided'); ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
