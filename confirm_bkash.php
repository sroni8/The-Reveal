<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db_connect.php';

$order_id = $_POST['order_id'];
$bkash_number = $_POST['bkash_number'];
$bkash_pin = $_POST['bkash_pin'];

$sql = "UPDATE orders SET payment_status = 'Paid' WHERE order_id = '$order_id'";

if (mysqli_query($conn, $sql)) {
    // payment success msz
    echo "<div style='text-align: center; margin-top: 50px; font-family: Arial, sans-serif;'>";
    echo "<h2 style='color: green;'>bKash Payment Successful! 🎉</h2>";
    echo "<p>Your order has been confirmed and paid successfully.</p>";
    echo "<br>";
    echo "<a href='index.html' style='padding: 10px 20px; background: #E2136E; color: white; text-decoration: none; border-radius: 5px;'>Go back to Home</a>";
    echo "</div>";
} else {
    echo "<h3 style='color:red; text-align:center;'>Payment Failed. Try Again. Error: " . mysqli_error($conn) . "</h3>";
}

$conn->close();
?>