<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/form.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/button.css">
    <title>Store Manager_ Supplies</title>
</head>
<body>
    <?php
        include "smnavbar.php";
    ?>
    <div class="content">
        <h1>Add New Supply</h1>

        <div class="form-container">
        <form class="form" method="post" action="<?php echo BASE_URL; ?>StoreControls/insertSupply" >
        
        

            <div class="form-group">
                <label for="stockItemID">Item ID:</label>
                <input type="text" id="StockItemID" name="StockItemID" required>
            </div>


            <div class="form-group">
                <label for="stockItemName">Item Name:</label>
                <input type="text" id="stockItemName" name="Name" value="<?php echo $stocks[0]->Name; ?>" required>
            </div>
           


           
            

            <div class="button-container">
                <button class="brownbutton" type="submit">Save</button>
            </div>
        </form>
        </div>
    </div>
    <script>
        
    </script>
</body>
</html>
