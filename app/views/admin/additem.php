<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product Item</title>
</head>
<body >
    
    
    <?php
        include "adminnav.php"
    ?>

        <div>
            <form  method="POST" action="addproductitem">

            
                <label for="itemname">Item Name:</label><br>
                <input type="text" id="itemname" name="itemname" required><br><br>

                <label for="retailprice">Retail Price:</label><br>
                <input type="number" id="retailprice" name="retailprice" required><br><br>
            
                <label for="stockprice">Stock Price:</label><br>
                <input type="number" id="stockprice" name="stockprice" required><br><br>
            
                <label for="itemdescription">Item Description:</label><br>
                <textarea id="itemdescription" name="itemdescription" rows="4" required></textarea><br><br>
            
                <input type="submit" value="Submit">

            </form>
        </div>
    </div>
    
</body>
</html>
