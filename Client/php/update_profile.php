<?php
session_start();
include 'config/db_connect.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone_number = htmlspecialchars($_POST['phone_number']);
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);

    // Update query for phone number, username, and email (Modify where clause as needed)
    $update_query = "UPDATE users SET 
        phone_number = '$phone_number',
        username = '$username',
        email = '$email' 
        WHERE id = 1"; // Change '1' to the actual logged-in user ID

    if ($conn->query($update_query) === TRUE) {
        echo "Profile updated successfully!";
    } else {
        echo "Error updating profile: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/update_profile.css">
    <title>Update Profile</title>

    <div class="navbar">
        <a href="cart.php">Cart</a>
        <a href="track_order.php">Track Order</a>
        <a href="update_profile.php">Settings</a>
        <a href="view_products.php">View</a>
        <a href="../index.php">Logout</a>
    </div>
</head>
<body>
    <h2>Update Profile</h2>
    <form method="POST">
        <label>Username:</label>
        <input type="text" name="username" required>

        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Phone Number:</label>
        <input type="text" name="phone_number" required>

        <button type="submit">Update</button>
    </form>
</body>
</html>
