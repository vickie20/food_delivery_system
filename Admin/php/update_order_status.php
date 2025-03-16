<?php
session_start();
include 'config/db_connect.php';

if (isset($_POST['order_id']) && isset($_POST['status'])) {
    $order_id = $_POST['order_id'];
    $status = $_POST['status'];

    $update_query = "UPDATE orders SET status = '$status' WHERE id = '$order_id'";
    if ($conn->query($update_query) === TRUE) {
        header("Location: admin_orders.php");
        exit();
    } else {
        echo "Error updating order status: " . $conn->error;
    }
}
?>
