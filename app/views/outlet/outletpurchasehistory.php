<!DOCTYPE html>
<html lang="en">
    
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/tables.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/cart.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <title>Home</title>
</head>
  
    <body>
    <?php
        include "omnavbar2.php";
    ?>

    <section class="content">
            <section class="cart" style="padding : 2%;font-size: 1em;">
                <h1 style="text-align:center">TODAY AVAILABILITIES</h1>
                <?php
                    echo "<br>";
                    echo "<table>";
                    echo "<tr>
                            <th>Item Code </th>
                            <th>Item Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>";

                    foreach ($productorderlines as $productorderline) {
                        
                        $productitem = new ProductItem();
                        $item = $productitem->where('Itemcode', $productorderline->Itemcode);
                        
                        echo "<tr>";
                        echo "<td>" . $productorderline->Itemcode . "</td>";
                        echo "<td>" . $item[0]->itemname. "</td>";
                        echo "<td>" . $productorderline->quantity . "</td>";
                        echo "<td>" . $productorderline->price . "</td>";
                        echo "</tr>";
                    }

                    echo "</table>";

                    ?>
        </section>
    </section>

    <script>
        var BASE_URL = "<?php echo BASE_URL; ?>";
        
        function loadSuppliers() {
            window.location.href = BASE_URL +  "StoreControls/viewSupplier";
        }

        function loadStocks() {
            window.location.href = BASE_URL +  "StoreControls/viewStocks";
        }
    </script>
    
</body>
</html>   

