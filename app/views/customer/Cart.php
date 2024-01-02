
<!DOCTYPE html>
<html>
<head>
    <title>Bakery Products</title>
</head>
<body>
    

    <?php
        
        echo "<h3>Unique ID: " . $unique_id . "</h3>";
        echo "<h1>Cart Items</h1>";
        foreach ($cartItems as $item) {
            echo "ID: " . $item['id'] . ", Quantity: " . $item['quantity'] . "<br>";
            }
    ?>

    <button onclick="edit()">edit</button>
    <button onclick="checkout()">checkout</button>
    <button onclick="cancel()">cancel</button>
    <button onclick="addmore()">addmore</button>

    <script>
        var BASE_URL = "<?php echo BASE_URL; ?>";

        function checkout(){
            window.location.href = BASE_URL +"CustomerControls/checkout";
        }

        function cancel(){
            window.location.href = BASE_URL +"CustomerControls/deletecart";
        }

        function edit(){
            window.location.href = BASE_URL +"CustomerControls/updatecart";
        }

        function addmore(){
            window.location.href = BASE_URL +"CustomerControls/showcategories";
        }
    </script>
</body>
</html>
