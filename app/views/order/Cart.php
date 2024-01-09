
<!DOCTYPE html>
<html>
<head>
    <title>Bakery Products</title>
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/cart.css">
</head>
<body>
        <section class="cart">
            <section class="content">
                <?php
                    include 'cartitems.php';
                ?>
            </section>
            <section class="buttongroup">
                <button class="yellowbutton" onclick="edit()">edit</button>
                <button class="greenbutton" onclick="checkout()">checkout</button>
                <button class="redbutton" onclick="cancel()">cancel</button>
                <button class="bluebutton" onclick="addmore()">addmore</button>
            </section>
        </section>

    <script>
        var BASE_URL = "<?php echo BASE_URL; ?>";

        function checkout(){
            window.location.href = BASE_URL +"OrderControls/checkout";
        }

        function cancel(){
            window.location.href = BASE_URL +"OrderControls/deletecart";
        }

        function edit(){
            window.location.href = BASE_URL +"OrderControls/updatecart";
        }

        function addmore(){
            window.location.href = BASE_URL +"OrderControls/showcategories";
        }
    </script>
</body>
</html>
