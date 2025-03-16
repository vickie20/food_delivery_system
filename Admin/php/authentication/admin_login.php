<?php include '../config/db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/authentication.css">
</head>
<body>
    <div class="form-container">
        <h2>Admin Login</h2>
        <form action="process_admin_login.php" method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <div class="nav-buttons">
            <a href="admin_signup.php">Register a business</a>
        </div>
    </div>
</body>
</html>
