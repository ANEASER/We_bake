<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://localhost/we_bake/app/views/storemanager/smstyle.css">
    <title>Store Manager</title>
</head>
<body>
    <?php
        include "smnavbar.php";
    ?>

    <div class="content">
            <div class="tile">
                <button onclick="loadSuppliers()"> Suppliers </button>
                
            </div>
            <div class="tile">
                <button onclick="loadStocks()"> Stocks </button>
                
            </div>
    </div>
   
    <script>

        function loadSuppliers() {
            window.location.href = "StoreControls/viewSupplier";
        }

        function loadStocks() {
            window.location.href = "StoreControls/viewStocks";
        }
    </script>
</body>
</html>
