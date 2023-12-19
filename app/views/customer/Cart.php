
<!DOCTYPE html>
<html>
<head>
    <title>Bakery Products</title>
</head>
<body>
    <button  onclick="placeorder()" > Customer Checkout</button>
    <script>

        var BASE_URL = "<?php echo BASE_URL; ?>";

        function placeorder(){
            window.location.href = BASE_URL +"CustomerControls/placeorder";
    }
    </script>
</body>
</html>
