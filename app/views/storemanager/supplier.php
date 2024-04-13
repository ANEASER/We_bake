
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <title>Store Manager_Suppliers</title>
</head>
<body>
    <?php
        include "smnavbar.php";
    ?>

    <a onclick="addSuppliers(this)" class="add-supplier-button">Add New Supplier</a>



    <div class="content">
        <h1>Suppliers</h1>

        <script>

        var BASE_URL = "<?php echo BASE_URL; ?>";
        
        function addSuppliers() {
            window.location.href = BASE_URL +  "StoreControls/addSupplier";
        }

        // function updateSuppliers(id) {
        //     window.location.href = BASE_URL +  "StoreControls/updateSupplier/id/"+id;
        // }
        // function getSupplierData() {
        //     window.location.href = BASE_URL +  "StoreControls/getSupplierData";
        // }

        // function deleteSuppliers(id) {
        //     window.location.href = BASE_URL +  "StoreControls/deleteSupplierData/id/"+id;
        // }

    </script>
</body>
</html>
