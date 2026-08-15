<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout | The Reveal</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;800&family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>
<!-- Same deep-bg class as cart.html keeps the two pages visually paired -->
<body class="deep-bg">

  <!-- ================= HEADER / NAV ================= -->
  <header class="site-header">
    <div class="wrap">
      <a href="index.html" class="logo">THE <span>REVEAL</span></a>
      <nav class="main-nav" aria-label="Primary">
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="index.html#mens">Men's</a></li>
          <li><a href="index.html#womens">Women's</a></li>
          <li><a href="index.html#kids">Kids</a></li>
          <li><a href="index.html#baby">Baby Dress</a></li>
        </ul>
      </nav>
      <a href="cart.html" class="cart-link">🛍 Cart</a>
    </div>
  </header>

  <main class="wrap">

    <div class="page-heading">
      <h1>Checkout</h1>
      <p>Almost there — a few details and your order is placed.</p>
    </div>

    <form class="checkout-layout" action="process_order.php" method="post">

      <div class="checkout-form">
        <h2>Delivery Details</h2>

        <div class="form-group">
          <label for="fullname">Full Name</label>
          <input type="text" id="fullname" name="user_name" placeholder="e.g. S islam Roni" required>
        </div>

        <div class="form-group">
          <label for="phone">Phone Number</label>
          <input type="tel" id="phone" name="user_phone" placeholder="e.g. 01XXXXXXXXX" required>
        </div>

        <div class="form-group">
          <label for="address">Delivery Address</label>
          <input type="text" id="address" name="address" placeholder="House, Road, Area, City">
        </div>

        <div class="form-group">
          <fieldset>
            <legend>Payment Method</legend>

            <div class="payment-option">
              <input type="radio" id="cod" name="payment" value="Cash on Delivery" checked>
              <label for="cod">Cash on Delivery</label>
            </div>

            <div class="payment-option">
              <input type="radio" id="bkash" name="payment" value="bKash">
              <label for="bkash">bKash</label>
            </div>
          </fieldset>
        </div>

        <button type="submit" class="btn btn-add btn-block">Place Order</button>
      </div>

      <aside class="order-summary">
        <h2>Order Summary</h2>
        
        <?php
            
            $product_name = isset($_GET['name']) ? $_GET['name'] : 'No item selected';
            $product_price = isset($_GET['price']) ? (int)$_GET['price'] : 0;
            
            
            $delivery_charge = 100;
            $total_amount = $product_price > 0 ? ($product_price + $delivery_charge) : 0;
        ?>

        <div style="margin-bottom: 20px; border-bottom: 1px solid #ddd; padding-bottom: 15px;">
            <div class="line" style="display: flex; justify-content: space-between; font-weight: 500;">
                <span><?php echo $product_name; ?></span>
                <span>৳ <?php echo $product_price; ?></span>
            </div>
        </div>

        <div class="line"><span>Delivery Charge</span><span>৳ <?php echo $delivery_charge; ?></span></div>
        <div class="line total"><span>Total Amount</span><span>৳ <?php echo $total_amount; ?></span></div>
        <input type="hidden" name="cart_total" value="<?php echo $total_amount; ?>">

      </aside>

      <!-- Hisab korar JavaScript -->
      <script>
        function updateTotal() {
            let deliveryCharge = 100; // Fixed delivery charge
            let total = deliveryCharge;
            let items = document.querySelectorAll('.item-checkbox');

            // Jei checkbox gulo select kora hobe tar dam jog hobe
            items.forEach(function(item) {
                if(item.checked) {
                    total += parseInt(item.value);
                }
            });

            // Page e dam dekhabe
            document.getElementById('total-display').innerText = '৳ ' + total;
            // PHP er kache dam pathanor jonno hidden field update hobe
            document.getElementById('hidden-total').value = total;
        }
      </script>

    </form>

  </main>

  <!-- ================= FOOTER (shared) ================= -->
  <footer class="site-footer">
    <p>Project by S Islam Roni|Team OkaZaki.</p>
    <div class="social-links">
        <a href="https://www.facebook.com/sakibronii" target="_blank">Facebook</a> | 
        <a href="https://www.linkedin.com/in/sakibul-islam-roni-37b224241/" target="_blank">LinkedIn</a> |
        <a href="mailto:sakibulislamroni1815@gmail.com">sakibulislamroni1815@gmail.com</a>
    </div>
    <p>phone: 01331775590</p>
  </footer>

</body>
</html>
