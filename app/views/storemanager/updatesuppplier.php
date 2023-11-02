<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://localhost/we_bake/app/views/storemanager/smstyle.css">
    <title>Store Manager_ Suppliers</title>
</head>
<body>
    <?php
        include "smnavbar.php";
    ?>
    <div class="content">
        <h1>Update Supplier</h1>


        <form method="post" action="http://localhost/We_bake/public/StoreControls/editSupplier">

            <div>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
            </div>

            <div class="form-group">
                <label for="supplierName">Supplier Name:</label>
                <input type="text" id="supplierName" name="name">
            </div> 
            <div class="form-group"> 
                <label for="suppliercontactnumber">Supplier Contact No.:</label> 
                <input type="text" id="suppliercontactnumber" name="contactno">
            </div>
            <div class="form-group"> 
                <label for="supplierAddress">Supplier Address:</label> 
                <input type="text" id="supplierAddress" name="address">
            </div>

            <div class="form-group">
                <label for="SupplierEmail">Supplier Email:</label>
                <input type="text" id="SupplierEmail" name="email" >
            </div>

            <div class="form-group">
                <label for="SupplierRating">Supplier Rating:</label>
                <input type="text" id="SupplierRating" name="Ratings">
            </div>
            <div class="button-container">
                <button class="formbutton" type="submit">Save</button>
            </div>

        </form>
            
    </div>
    <script></script>
</body>
</html>
