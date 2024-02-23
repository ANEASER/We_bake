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
            <form method="POST" action="<?php echo BASE_URL; ?>AdminControls/addproductitem" enctype="multipart/form-data">
            
                <label for="itemname">Item Name:</label><br>
                <input type="text" id="itemname" name="itemname" required><br><br>

                <label for="retailprice">Retail Price:</label><br>
                <input type="number" id="retailprice" name="retailprice" required><br><br>
            
                <label for="stockprice">Stock Price:</label><br>
                <input type="number" id="stockprice" name="stockprice" required><br><br>
            
                <label for="itemdescription">Item Description:</label><br>
                <textarea id="itemdescription" name="itemdescription" rows="4" required></textarea><br><br>

                <label for="category">Category:</label><br>
                <select id="category" name="category">
                    <option value="Bread">Bread</option>
                    <option value="Pastries">Pastries</option>
                    <option value="Cakes">Cakes</option>
                    <option value="Cookies">Cookies</option>
                    <option value="Muffins">Muffins</option>
                    <option value="Doughnuts">Doughnuts</option>
                    <option value="Pies">Pies</option>
                    <option value="Buns">Buns</option>
                    <option value="Rolls">Rolls</option>
                    <option value="Sandwiches">Sandwiches</option>
                    <option value="Pizza">Pizza</option>
                    <option value="Others">Others</option>

                </select><br><br>

                <label for="image">Item Image</label>
                <input type="file" name="image" id="image" required>
            
                <input type="submit" value="Submit">

            </form>
        </div>
    </div>
    
</body>
</html>
