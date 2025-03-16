<?php include '../config/db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Signup</title>
    <link rel="stylesheet" href="css/authentication.css">
</head>
<body>
    <div class="form-container">
        <h2>Admin Sign Up</h2>
        <form action="process_admin_signup.php" method="POST">
            <input type="text" name="bsname" placeholder="Business Name" required>
            <input type="email" name="email" placeholder="Owner's Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Register Business</button>
        </form>
        <div class="nav-buttons">
            <a href="admin_login.php">Already registered? Login</a>
        </div>
    </div>
</body>
</html>
