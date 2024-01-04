
<!DOCTYPE html>
<html>
<head>
    <title>Bakery Products</title>
</head>
<body>
    
    <?php
        include 'cartitems.php';
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
