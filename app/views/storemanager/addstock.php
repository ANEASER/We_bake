<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/form.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/button.css">
    <title>Store Manager_ Stocks</title>
</head>
<body>
    <?php
        include "smnavbar.php";
    ?>
    <div class="content">
        <h1>Add Stock Items</h1>

        <form method="post" action="<?php echo BASE_URL; ?>StoreControls/addStockItem" >
        <div class="form-container">
            <div class="form-group">
                <label for="stockItemName">Item Name:</label>
                <input type="text" id="stockItemName" name="Name" required>
            </div>
            <div class="form-group">
                <label for="stockItemType">Item Type:</label>
                <select id="stockItemType" name="Type" required>
                    <option value="">Select Item Type</option>
                    <option value="Flour">Flour</option>
                    <option value="Sugar">Sugar</option>
                    <option value="Eggs">Eggs</option>
                    <option value="Dairy">Dairy</option>
                    <option value="Fats and Oils">Fats and Oils</option>
                    <option value="Leavening Agents">Leavening Agents</option>
                    <option value="Flavorings">Flavorings</option>
                    <option value="Nuts and Seeds">Nuts and Seeds</option>
                    <option value="Fruits">Fruits</option>
                    <option value="Chocolate and Cocoa Products">Chocolate and Cocoa Products</option>
                    <option value="Spices and Herbs">Spices and Herbs</option>
                    <option value="Grains and Cereals">Grains and Cereals</option>
                    <option value="Sweeteners">Sweeteners</option>
                    <option value="Emulsifiers and Stabilizers">Emulsifiers and Stabilizers</option>
                    <option value="Preservatives">Preservatives</option>
                    <option value="Acids">Acids</option>
                 </select>
            </div>
            <div class="form-group">
                <label for="stockItemUnit">Unit of Measurement:</label>
                <select id="stockItemUnit" name="UnitOfMeasurement" required>
                    <option value="">Select Unit of Measurement</option>
                    <option value="Grams (g)">Grams (g)</option>
                    <option value="Kilograms (kg)">Kilograms (kg)</option>
                    <option value="Ounces (oz)">Ounces (oz)</option>
                    <option value="Pounds (lb)">Pounds (lb)</option>
                    <option value="Milliliters (ml)">Milliliters (ml)</option>
                    <option value="Liters (l)">Liters (l)</option>
                    <option value="Teaspoons (tsp)">Teaspoons (tsp)</option>
                    <option value="Tablespoons (tbsp)">Tablespoons (tbsp)</option>
                    <option value="Cups">Cups</option>
                    <option value="Fluid ounces (fl oz)">Fluid ounces (fl oz)</option>
                    <option value="Each">Each (for individual items)</option>
                 </select>
            </div>


            <div class="form-group">
                <label for="stockItemMin">Minimum Amount:</label>
                <input type="text" id="stockItemMin" name="MinimumStock" required>
            </div>

            <div class="form-group">
                <label for="stockItemCritical">Critical Amount:</label>
                <input type="text" id="stockItemCritical" name="CriticalStock" required>
            </div>

            

            <div class="button-container">
                <button class="brownbutton" type="submit">Save</button>
            </div>
        </form>
        </div>
    </div>
    <script></script>
</body>
</html>
