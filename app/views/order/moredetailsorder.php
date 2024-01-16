<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/tables.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/cart.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <title>More order Details</title>
</head>
<body>
    <?php
        include 'customernav.php';
    ?>
    <section class="content">
        <section class="cart" style="padding : 2%;font-size: 1em;">
                <?php
                    echo "<h1>Order : ".$order[0]->orderref."</h1>";
                    echo "<h1>Order Status : ".$order[0]->orderstatus."</h1>";
                    echo "<h1>Order Delivery Date : ".$order[0]->orderdate."</h1>";
                    echo "<h1 class='hideondesktop'>Order Delivery Address : ".$order[0]->deliver_address."</h1>";
                    echo "<h1 class='hideondesktop'>Order Delivery Status : ".$order[0]->deliverystatus."</h1>";
                    echo "<h1 class='hideondesktop'>Order Payment Status : ".$order[0]->paymentstatus."</h1>";
                    echo "<br>";
                    echo "<table>";
                    echo "<tr>
                            <th>Item Code </th>
                            <th>Item Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                        </tr>";

                    foreach ($productorderlines as $productorderline) {
                        
                        $productitem = new ProductItem();
                        $item = $productitem->where('Itemcode', $productorderline->Itemcode);
                        
                        echo "<tr>";
                        echo "<td>" . $productorderline->Itemcode . "</td>";
                        echo "<td>" . $item[0]->itemname. "</td>";
                        echo "<td>" . $productorderline->quantity . "</td>";
                        echo "<td>" . $productorderline->price . "</td>";
                        echo "<td>" . $productorderline->totalprice . "</td>";
                        echo "</tr>";
                    }

                    echo "</table>";
                ?>
                <button class="bluebutton" onclick="backtoorders()">Back to Orders</button>
        </section>
    </section>
    <script>
            var BASE_URL = "<?php echo BASE_URL; ?>";

            // Make sure to properly encode the user information
            var user = <?php echo json_encode($_SESSION["USER"]); ?>;
            
            console.log(user);
            
           
            function backtoorders() {

            if(!user.role){
                window.location.href = BASE_URL + "CustomerControls/purchasehistory";}
            }
    </script>

        
</body>
</html>