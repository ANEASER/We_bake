
<!DOCTYPE html>
<html>
<head>
    <title>Bakery Products</title>
</head>
<body>
    

    <?php
        
        echo "<h1>Cart Items</h1>";

        echo "<table>
        <tr>
            <th>ID</th>
            <th>Code</th>
            <th>Quantity</th>
        </tr>";

        foreach ($cartItems as $item) {
            echo "<tr>
                    <td>{$item['id']}</td>
                    <td>{$item['code']}</td>
                    <td>{$item['quantity']}</td>
                  </tr>";  
            }

        echo "</table>";
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
