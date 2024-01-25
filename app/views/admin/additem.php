<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product Item</title>
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/form.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
</head>
<body >
    
    
    <?php
        include "adminnav.php"
    ?>
    <section>
        <div class="form-container">
            <form  class="form" method="POST" action="<?php echo BASE_URL; ?>AdminControls/addproductitem" enctype="multipart/form-data">
            
                <div class="form-group">
                    <label for="itemname">Item Name:</label>
                    <input type="text" id="itemname" name="itemname" required>
                </div>
                    
                <div class="form-group">
                    <label for="retailprice">Retail Price:</label>
                    <input type="number" id="retailprice" min=1 name="retailprice" required>
                 </div>
                    
                <div class="form-group">
                    <label for="stockprice">Stock Price:</label>
                    <input type="number" id="stockprice" min=1 name="stockprice" required>
                </div>
                    
                <div class="form-group">
                    <label for="itemdescription">Item Description:</label>
                    <textarea id="itemdescription" name="itemdescription" rows="4" required></textarea>
                </div>
                    
                <div class="form-group">
                    <label for="category">Category:</label>
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

                    </select>
                </div>
                    
                <div class="form-group">
                    <label for="image">Item Image</label>
                    <input type="file" name="image" id="image" required>
                </div>
                    
                    <input class="bluebutton" type="submit" value="Submit">

            </form>
        </div>
    </section>
    
</body>
</html>
