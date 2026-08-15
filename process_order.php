<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['user_name'];
    $phone = $_POST['user_phone'];
    $payment_method = $_POST['payment'];
    $total_amount = $_POST['cart_total'];

    $check_user = "SELECT user_id FROM users WHERE phone = '$phone'";
    $result = $conn->query($check_user);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user_id = $row['user_id'];
    } else {
        $sql_user = "INSERT INTO users (name, phone) VALUES ('$name', '$phone')";
        if ($conn->query($sql_user) === TRUE) {
            $user_id = $conn->insert_id; 
        } else {
            die("<h3 style='color:red;'>Users table e error: " . $conn->error . "</h3>");
        }
    }

    // UPDATE:  'Unpaid' 
    $sql_order = "INSERT INTO orders (user_id, total_amount, payment_method, payment_status) VALUES ('$user_id', '$total_amount', '$payment_method', 'Unpaid')";

    if ($conn->query($sql_order) === TRUE) {
        // check bkash naki COD
        $order_id = $conn->insert_id; 
        
        if ($payment_method == 'bKash') {
            // link bKash
            header("Location: bkash_page.php?order_id=$order_id&amount=$total_amount");
            exit();
        } else {
            // COD ager success message tai dekhabe
            echo "<div style='text-align: center; margin-top: 50px;'>";
            echo "<h2 style='color: green;'>Order Successfully Placed!</h2>";
            echo "<p>Thank you, $name! Your order has been received.</p>";
            echo "<a href='index.html'>Go back to Home</a>";
            echo "</div>";
        }
    } else {
        echo "<h3 style='color:red;'>Orders table e error: " . $conn->error . "</h3>";
    }
    
    $conn->close();
} else {
    echo "<h2 style='color:red; text-align:center;'>Error: Tumi form submit koro nai!</h2>";
}
?>