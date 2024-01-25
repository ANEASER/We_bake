<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/form.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <title>Edit Product Item</title>
</head>
<body>
    
    
    <?php
        include "adminnav.php"
    ?>
     <section>
        <div class="form-container">
            <form  method="POST"  class="form"  action="<?php echo BASE_URL; ?>AdminControls/editproduct">

                <input type="hidden" name="id" value="<?php echo $data[0]->itemid; ?>"> 
            
            <div class="form-group">
                <label for="itemname">Item Name:</label>
                <input type="text" id="itemname" name="itemname" placeholder="<?php echo $data[0]->itemname; ?>">
            </div>

            <div class="form-group">
                <label for="retailprice">Retail Price:</label> 
                <input type="number" id="retailprice" name="retailprice" min=1 placeholder="<?php echo $data[0]->retailprice; ?>">
            </div>

            <div class="form-group">
                <label for="stockprice">Stock Price:</label>
                <input type="number" id="stockprice" name="stockprice" min=1 placeholder="<?php echo $data[0]->stockprice; ?>">
            </div>

            <div class="form-group">
                <label for="itemdescription">Item Description:</label>
                <textarea id="itemdescription" name="itemdescription" rows="4" placeholder="<?php echo $data[0]->itemdescription; ?>"></textarea>
            </div>
            
            <div class="form-group">
                <label for="category">Category:</label>
                <select id="category" name="category" placeholder="<?php echo $data[0]->category; ?>">
                    <option value="Bread">Bread</option>
                    <option value="Pastries">Pastries</option>
                    <option value="Cakes">Cakes</option>
                    <option value="Cookies">Cookies</option>
                    <option value="Muffins">Muffins</option>
                    <option value="Doughnuts">Doughnuts</option>
                    <option value="Pies">Pies</option>
                    <option value="Rolls and Buns">Rolls and Buns</option>
                    <option value="Sandwiches">Sandwiches</option>
                    <option value="Pizza">Pizza</option>
                    <option value="Others">Others</option>
                </select>
            </div>
                    
                <input class="bluebutton" type="submit" value="Submit">
                
            </form>
        </div>
    </section>
</body>
</html>
