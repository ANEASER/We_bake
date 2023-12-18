<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://localhost/we_bake/app/views/storemanager/smstyle.css">
    <title>Store Manager_ Stocks</title>
</head>
<body>
    <?php
        include "smnavbar.php";
    ?>
    <div class="content">
        <h1>Add Stock Items</h1>

        <form method="post">
        <div class="form-group">
                <label for="stockItemName">Item Name:</label>
                <input type="text" id="stockItemName" name="name" required>
            </div> 
            <div class="form-group"> 
                <label for="availableAmount">Available Amount:</label> 
                <input type="text" id="availableAmount" name="available" required>
            </div>
            <div class="form-group"> 
                <label for="stockItemUnits">No. of Units:</label> 
                <input type="text" id="stockItemUnits" name="unit" required>
            </div>

            <div class="form-group">
                <label for="stockItemExpireDate">Expire Date:</label>
                <input type="date" id="stockItemExpireDate" name="expierydate"  required>
            </div>

            <div class="form-group">
                <label for="supplier">Supplier:</label>
                <input type="text" id="supplier" name="supplier" required>
            </div>

            <div class="form-group">
                <label for="stockItemCode">Item Code:</label>
                <input type="text" id="stockItemCode" name="itemcode" required>
            </div>

            <div class="button-container">
                <button class="formbutton" type="submit">Save</button>
            </div>

        </form>
            
    </div>
    <script></script>
</body>
</html>
