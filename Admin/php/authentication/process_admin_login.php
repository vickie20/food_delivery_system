<?php
include 'db_connect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admins WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['admin_email'] = $email;
            $_SESSION['bsname'] = $row['bsname'];
            header("Location: ../add_product.php");
        } else {
            echo "Incorrect password!";
        }
    } else {
        echo "Admin not found!";
    }
}
$conn->close();
?>
