<?php
include '../config/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bsname = $_POST['bsname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO admins (bsname, email, password) VALUES ('$bsname', '$email', '$password')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Business registered successfully! <a href='admin_login.php'>Login here</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}
$conn->close();
?>
