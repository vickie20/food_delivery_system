<?php include 'config/db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="../css/add_product.css">
    <link rel="stylesheet" href="../css/global.css">
</head>
<body>
<div class="navbar">
    <a href="admin_users.php">Users</a>
    <a href="admin_orders.php">Orders</a>
    <a href="view_products.php">View</a>
    <a href="add_product.php">Add Product</a>

    <a href="../index.php">Logout</a>
</div>
    <div class="form-container">
        <h2>Add New Product</h2>
        <form action="process_add_product.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="Product Name" required>
            <textarea name="description" placeholder="Product Description" required></textarea>
            <input type="number" name="price" placeholder="Price (KSh)" step="0.01" required>
            <input type="file" name="image" required>
            <button type="submit">Add Product</button>
        </form>
        <div class="nav-buttons">
            <a href="view_products.php">View Products</a>
        </div>
    </div>
</body>
</html>
