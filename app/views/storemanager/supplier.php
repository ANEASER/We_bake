
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store Manager_ Suppliers</title>
</head>
<body>
    <?php
        include "smnavbar.php";
    ?>
    <div class="content">
        <h1>Suppliers</h1>

        <script>
        
        function addSuppliers() {
            window.location.href = BASE_URL +  "StoreControls/addSupplier";
        }

        function updateSuppliers(id) {
            window.location.href = BASE_URL +  "StoreControls/updateSupplier/id/"+id;
        }
        function getSupplierData() {
            window.location.href = BASE_URL +  "StoreControls/getSupplierData";
        }

        function deleteSuppliers(id) {
            window.location.href = BASE_URL +  "StoreControls/deleteSupplierData/id/"+id;
        }

    </script>
</body>
</html>
