<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/form.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/button.css">
    <title>Store Manager_ Suppliers</title>
</head>
<body>
    <?php
        include "smnavbar.php";
    ?>  
    <div class="content">
        <h1>Add Suppliers</h1>


        <form method="POST" action="<?php echo BASE_URL; ?>addSupplierData">
        <div class="form-container">

            <div class="form-group">
                <label for="supplierName">Supplier Name:</label>
                <input type="text" id="supplierName" name="SupplierName" required>
            </div> 
            <div class="form-group"> 
                <label for="contactPerson">Contact Person:</label> 
                <input type="text" id="contactPerson" name="ContactPerson">
            </div>
            <div class="form-group"> 
                <label for="contactEmail">Contact Email:</label> 
                <input type="email" id="contactEmail" name="ContactEmail">
            </div>
            <div class="form-group"> 
                <label for="contactPhone">Contact Phone:</label> 
                <input type="text" id="contactPhone" name="ContactPhone">
            </div>
            <div class="form-group"> 
                <label for="supplierAddress">Supplier Address:</label> 
                <input type="text" id="supplierAddress" name="Address">
            </div>
            <div class="form-group"> 
                <label for="supplierCity">City:</label> 
                <input type="text" id="supplierCity" name="City">
            </div>
            <div class="form-group"> 
                <label for="rawMaterial">Type of Raw Material:</label> 
                <input type="text" id="rawMaterial" name="TypeOfRawMaterial">
            </div>
            <div class="form-group">
                <button class="formbutton" type="submit">Save</button>
            </div>

        </div>

        </form>
            
    </div>
    <script></script>
</body>
</html>
