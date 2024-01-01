
<!DOCTYPE html>
<html>
<head>
    <title>Bakery Products</title>
</head>
<body>
    

    <?php

        $cartItems = $_SESSION['cart'];
        $unique_id = $_SESSION['unique_id'];

        echo "<h3>Unique ID: " . $unique_id . "</h3>";
        echo "<h1>Cart Items</h1>";
        foreach ($cartItems as $item) {
            echo "ID: " . $item['id'] . ", Quantity: " . $item['quantity'] . "<br>";
            }
    ?>

    <button onclick="checkout()">checkout</button>
    <button onclick="cancel()">cancel</button>
    <button onclick="edit()">edit</button>
    <button onclick="addmore()">addmore</button>

    <script>
        var BASE_URL = "<?php echo BASE_URL; ?>";

        function checkout(){
            window.location.href = BASE_URL +"RecieptionControls/checkout";
        }

        function cancel(){
            window.location.href = BASE_URL +"RecieptionControls/deletecart";
        }

        function edit(){
            window.location.href = BASE_URL +"RecieptionControls/updatecart";
        }

        function addmore(){
            window.location.href = BASE_URL +"RecieptionControls/showcategories";
        }
    </script>
</body>
</html>
