
<!DOCTYPE html>
<html>
<head>
    <title>Bakery Products</title>
</head>
<body>
    <button onclick="placeorder()">Customer Checkout</button>

    <?php

        $cartItems = $_SESSION['cart'];
        foreach ($cartItems as $item) {
            echo "ID: " . $item['id'] . ", Quantity: " . $item['quantity'] . "<br>";
            }
    ?>

    <script>
        var BASE_URL = "<?php echo BASE_URL; ?>";

        function placeorder(){
            window.location.href = BASE_URL +"CustomerControls/placeorder";
    }
    </script>
</body>
</html>
