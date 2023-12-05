<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product Item</title>
</head>
<body>
    
    
    <?php
        include "adminnav.php"
    ?>
            <form  method="POST"  action="http://localhost/we_bake/public/AdminControls/editproduct">

                <input type="hidden" name="id" value="<?php echo $data[0]->itemid; ?>"> 
                
                <label for="itemname">Item Name:</label><br>
                <input type="text" id="itemname" name="itemname" placeholder="<?php echo $data[0]->itemname; ?>"><br><br>

                <label for="retailprice">Retail Price:</label><br>
                <input type="number" id="retailprice" name="retailprice" placeholder="<?php echo $data[0]->retailprice; ?>"><br><br>
                
                <label for="stockprice">Stock Price:</label><br>
                <input type="number" id="stockprice" name="stockprice" placeholder="<?php echo $data[0]->stockprice; ?>"><br><br>

                <label for="itemdescription">Item Description:</label><br>
                <textarea id="itemdescription" name="itemdescription" rows="4" placeholder="<?php echo $data[0]->itemdescription; ?>"></textarea><br><br>
               
                <input class="formbutton" type="submit" value="Submit">
                
            </form>
</body>
</html>
