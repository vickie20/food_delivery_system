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
    <link rel="stylesheet" href="../css/view_product.css">
    <title>Client View</title>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <a href="cart.php">Cart</a>
        <a href="track_order.php">Track Order</a>
        <a href="update_profile.php">Settings</a>
        <a href="view_products.php">View</a>
        <a href="../index.php">Logout</a>
    </div>

    <h2>Order Your Food</h2>

    <!-- Product Container -->
    <div class="product-container">
        <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="product-card">
                <img src="data:image/jpeg;base64,<?php echo base64_encode($row['image']); ?>" />
                <h3><?php echo htmlspecialchars($row['name']); ?></h3>
                <p><?php echo htmlspecialchars($row['description']); ?></p>
                <p>KSh <?php echo number_format($row['price'], 2); ?></p>
                <form action="add_to_cart.php" method="POST">
                    <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                    <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($row['name']); ?>">
                    <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                    <label>Quantity:</label>
                    <input type="number" name="quantity" value="1" min="1">
                    <button type="submit">Add to Cart</button>
                </form>
            </div>
        <?php } ?>
    </div>
</body>
</html>
