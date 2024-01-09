<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/tables.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/category.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/cart.css">
    <title>More order Details</title>
</head>
<body>
    <?php
        include 'customernav.php';
    ?>
    <section class="content">
        <section class="cart">
                <?php
                    echo "<h1>Order : ".$order[0]->orderref."</h1>";
                    echo "<h1>Order Status : ".$order[0]->orderstatus."</h1>";
                    echo "<h1>Order Delivery Date : ".$order[0]->orderdate."</h1>";
                    echo "<br>";
                    echo "<table>";
                    echo "<tr>
                            <th>Quantity</th>
                            <th>Item Code </th>
                            <th>Item Name</th>
                            <th>Price</th>
                            <th>Subtotal</th>
                        </tr>";

                    foreach ($productorderlines as $productorderline) {
                        
                        $productitem = new ProductItem();
                        $item = $productitem->where('Itemcode', $productorderline->Itemcode);
                        
                        echo "<tr>";
                        echo "<td>" . $productorderline->quantity . "</td>";
                        echo "<td>" . $productorderline->Itemcode . "</td>";
                        echo "<td>" . $item[0]->itemname. "</td>";
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
        
        function backtoorders(){
            window.location.href = BASE_URL + "CustomerControls/purchasehistory";
        }
        
    </script>
        
</body>
</html>