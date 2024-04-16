<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/tables.css">
    <title>Store Manager_Stocks</title>
</head>
<body>
    <?php
        include "smnavbar.php";
    ?>

    <a onclick="addStockItem(this)" class="add-stocks-button">Add New Stocks</a>

    <div class="content">
        <h1>Stocks</h1>
        
    </div>

    <section style="display:flex;justify-content:space-around; width:100%">
    <?php //The table structure 
        if (count($stocks) > 0){
            echo '<table style="width:100%">';
            echo '<tr>
                    <th> Item ID </th>
                    <th> Name </th>
                    <th class="hideonmobile" > Item Type </th>
                    <th class="hideonmobile" > Unit of Measurement</th>
                    <th class="hideonmobile" > Minimum Stock</th>
                    <th class="hideonmobile" > Critical Stock</th>
                </tr>';

                foreach($stocks as $stocks){
                    echo '<tr>';
                    echo '<td>' . $stocks->ItemID . '</td>';
                    echo '<td>' . $stocks->Name . '</td>';
                    echo '<td class="hideonmobile>' . $stocks->Type . '</td>';
                    echo '<td class="hideonmobile>' . $stocks->UnitOfMeasurement . '</td>';
                    echo '<td class="hideonmobile>' . $stocks->MinimumStock . '</td>';
                    echo '<td class="hideonmobile>' . $stocks->CriticalStock . '</td>';
                    // echo '<td class="hideonmobile"><button class="yellowbutton" onclick="edit(' . $stocks->UserID . ')">Update</button></td>';
                    // echo '<td class="hideonmobile"><button class="redbutton" onclick="del(' . $user->UserID . ')">Delete</button></td>';
                    echo '</tr>';

                }
            echo '</table>';

        }

        else{
            echo '<h3> No stocks available </h3>';
        }
        
    ?>
    </section>
    <script>

        var BASE_URL = "<?php echo BASE_URL; ?>";

        function addStockItem() {
            window.location.href = BASE_URL +  "StoreControls/addStock";
        }

        function viewall() {
            window.location.href = BASE_URL + "StoreControls/loadStocksView";
        }

        function updateStocks() {
            window.location.href = BASE_URL +  "StoreControls/updateStocks";
        }

        function deleteStocks() {
            window.location.href = BASE_URL +  "StoreControls/deleteStocks";
        }

    </script>
</body>
</html>
