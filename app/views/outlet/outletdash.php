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

    <h1> </h1>

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

