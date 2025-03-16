<?php
include 'config/db_connect.php';

$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <link rel="stylesheet" href="../css/view_product.css">
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <a href="admin_users.php">Users</a>
        <a href="admin_orders.php">Orders</a>
        <a href="view_products.php">View</a>
        <a href="add_product.php">Add Product</a>
        <a href="../index.php">Logout</a>
    </div>

    <h2>Products List</h2>

    <!-- Product Container -->
    <div class="product-container">
        <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="product-card">
                <img src="data:image/jpeg;base64,<?php echo base64_encode($row['image']); ?>" />
                <h3><?php echo htmlspecialchars($row['name']); ?></h3>
                <p><?php echo htmlspecialchars($row['description']); ?></p>
                <p>KSh <?php echo number_format($row['price'], 2); ?></p>
                <div class="btn-group">
                    <a href="edit_product.php?id=<?php echo $row['id']; ?>" class="edit-btn">Edit</a>
                    <a href="delete_product.php?id=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('Are you sure?')">Delete</a>
                </div>
            </div>
        <?php } ?>
    </div>
</body>
</html>
