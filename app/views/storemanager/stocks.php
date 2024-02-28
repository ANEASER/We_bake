<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
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
    <script>

        var BASE_URL = "<?php echo BASE_URL; ?>";

        function addStockItem() {
            window.location.href = BASE_URL +  "StoreControls/addStockItem";
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
