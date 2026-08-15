<?php
// bkash_page.php
$order_id = $_GET['order_id'];
$amount = $_GET['amount'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>bKash Payment</title>
    <style>
        body { background-color: #E2136E; color: white; font-family: Arial, sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .bkash-container { background: white; color: black; padding: 30px; border-radius: 10px; width: 350px; text-align: center; box-shadow: 0 4px 10px rgba(0,0,0,0.2); }
        .bkash-container img { width: 150px; margin-bottom: 20px; }
        input[type="text"], input[type="password"] { width: 90%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 5px; text-align: center; }
        .btn-pay { background: #E2136E; color: white; border: none; padding: 10px 20px; width: 100%; border-radius: 5px; cursor: pointer; font-size: 16px; margin-top: 10px; }
    </style>
</head>
<body>

    <div class="bkash-container">
        <!-- bKash Logo -->
        <h2>bKash Payment</h2>
        <p>Merchant: The Reveal</p>
        <p><strong>Amount: ৳ <?php echo $amount; ?></strong></p>

        <form action="confirm_bkash.php" method="post">
            <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
            <input type="text" name="bkash_number" placeholder="e.g 01XXXXXXXXX" required>
            <input type="password" name="bkash_pin" placeholder="Enter PIN" required>
            <button type="submit" class="btn-pay">Confirm Payment</button>
        </form>
    </div>

</body>
</html>