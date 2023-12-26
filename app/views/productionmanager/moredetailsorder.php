<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>More order Details</title>
</head>
<body>
    <h1>More order Details</h1>
    <button onclick="backtoorders()" >Back to orders</button>
    <?php
        echo "<table>";
        echo "<tr>
                <th>Shopping ID</th>
                <th>Quantity</th>
                <th>Unit</th>
                <th>Item ID</th>
                <th>Total Price</th>
                <th>Unique ID</th>
                <th>Price</th>
            </tr>";

        foreach ($productorderlines as $productorderline) {
            echo "<tr>";
            echo "<td>" . $productorderline->shoppingid . "</td>";
            echo "<td>" . $productorderline->quantity . "</td>";
            echo "<td>" . $productorderline->unit . "</td>";
            echo "<td>" . $productorderline->itemid . "</td>";
            echo "<td>" . $productorderline->totalprice . "</td>";
            echo "<td>" . $productorderline->price . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    ?>

    <script>
        var BASE_URL = "<?php echo BASE_URL; ?>";
        
        function backtoorders(){
            window.location.href = BASE_URL + "PmControls/index";
        }
    </script>
        
</body>
</html>