<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store Manager</title>
</head>
<body>
    <?php
        include "smnavbar.php";
    ?>

    <div class="content">
            <h1>This is the Store Manager Dashboard </h1>
            <h1>In here goes the table that shows the stocks sorted to the expiry date/FIFO </h1>
    </div>
   
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
