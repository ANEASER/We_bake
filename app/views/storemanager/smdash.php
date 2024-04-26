<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/form.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/button.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/tables.css">
    <title>Store Manager</title>
</head>
<body>
    <?php
        include "smnavbar.php";
    ?>

    <div class="content">
            <h1>Store Manager Dashboard </h1>       
    </div>

    <section style="display:flex;justify-content:space-around; width:100%">
    <?php //The table structure 
        if (count($supplies) > 0){
            echo '<table style="width:90%">';
            echo '<tr>
                    <th> Supply ID </th>
                    <th> Stock Item ID </th>
                    <th> Stock Item Name </th>
                    <th> Delivered Date</th>
                    <th> Invoice Number</th>
                    <th> Expiry date</th>
                    <th> Delivered Quantity</th>
                </tr>';

                foreach($supplies as $supplies){
                    echo '<tr>';
                    echo '<td>' . $supplies->CustomSupplyID . '</td>';
                    echo '<td>' . $supplies->CustomStockItemID . '</td>';
                    echo '<td>' . $supplies->StockItemName . '</td>';
                    echo '<td>' . $supplies->DeliveredDate . '</td>';
                    echo '<td>' . $supplies->InvoiceNo . '</td>';
                    echo '<td>' . $supplies->ExpiryDate . '</td>';
                    echo '<td>' . $supplies->DeliveredQuantity . '</td>';
                    echo '</tr>';

                }
            echo '</table>';

        }

        else{
            echo '<h3> No supply records available </h3>';
        }
        
    ?>
    </section>
   
    <script>
        var BASE_URL = "<?php echo BASE_URL; ?>";
        
        
    </script>
</body>
</html>
