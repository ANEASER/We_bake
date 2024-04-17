<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/tables.css">
    <title>Store Manager_Supplies</title>
</head>
<body>
    <?php
        include "smnavbar.php";
    ?>

    

    <div class="content">
        <h1>Supply Records</h1>
        
    </div>

    <!-- <section style="display:flex;justify-content:space-around; width:100%">
    <?php //The table structure 
        if (count($stocks) > 0){
            echo '<table style="width:90%">';
            echo '<tr>
                    <th> Item ID </th>
                    <th> Name </th>
                    <th> Item Type </th>
                    <th> Unit of Measurement</th>
                    <th> Available Stock</th>
                    <th> Minimum Stock</th>
                    <th> Critical Stock</th>
                    <th> Update</th>
                    <th> Delete</th>
                </tr>';

                foreach($stocks as $stocks){
                    echo '<tr>';
                    echo '<td>' . $stocks->ItemID . '</td>';
                    echo '<td>' . $stocks->Name . '</td>';
                    echo '<td>' . $stocks->Type . '</td>';
                    echo '<td>' . $stocks->UnitOfMeasurement . '</td>';
                    echo '<td>' . $stocks->AvailableStock . '</td>';
                    echo '<td>' . $stocks->MinimumStock . '</td>';
                    echo '<td>' . $stocks->CriticalStock . '</td>';
                    echo '<td> <button class="yellowbutton" onclick="updateStocks(' . $stocks->ItemID . ')">Update</button></td>';
                    echo '<td class="hideonmobile"><button class="redbutton" onclick="deleteStocks(' . $stocks->ItemID . ')">Delete</button></td>';
                    echo '</tr>';

                }
            echo '</table>';

        }

        else{
            echo '<h3> No stocks available </h3>';
        }
        
    ?>
    </section> -->
    <script>

        var BASE_URL = "<?php echo BASE_URL; ?>";

        // function addStockItem() {
        //     window.location.href = BASE_URL +  "StoreControls/addStock";
        // }

        // function updateStocks() {
        //     window.location.href = BASE_URL +  "StoreControls/updateStocks";
        // }

        // function deleteStocks() {
        //     window.location.href = BASE_URL +  "StoreControls/deleteStocks";
        // }

    </script>
</body>
</html>
