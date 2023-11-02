
<!DOCTYPE html>
<html>
<head>
    <title>Bakery Products</title>
    <link rel="stylesheet" type="text/css" href="http://localhost\we_bake\app\views\customer\customersytles.css">
</head>
<body>
    
        <?php
        include "sidebar.php"
        ?>
        
    <div class="sub-container">
    <table style="margin-top:5%;">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Chocolate Croissant</td>
                <td>$2.50</td>
                <td>2</td>
                <td>$5.00</td>
            </tr>
            <tr>
                <td>Blueberry Muffin</td>
                <td>$1.75</td>
                <td>3</td>
                <td>$5.25</td>
            </tr>
            <tr>
                <td>Cinnamon Roll</td>
                <td>$2.00</td>
                <td>1</td>
                <td>$2.00</td>
            </tr>
        </tbody>
    </table>
    
    
    </div>
    <button class="button2" onclick="placeorder()" >Checkout</button>
    <script>
        function placeorder(){
            window.location.href = "http://localhost/we_bake/public/customercontrols/placeorder";
    }
    </script>
</body>
</html>
