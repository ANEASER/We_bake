<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store Manager_Stocks</title>
</head>
<body>
    <?php
        include "smnavbar.php";
    ?>
    <div class="content">
        <h1>Stocks</h1>
    </div>
    <script>

        function addStockItem() {
            window.location.href = BASE_URL +  "StoreControls/addStockItem";
        }

        function updateStocks() {
            window.location.href = BASE_URL +  "toreControls/updateStocks";
        }

        function deleteStocks() {
            window.location.href = BASE_URL +  "StoreControls/deleteStocks";
        }

    </script>
</body>
</html>
