<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/form.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/button.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.min.css" rel="stylesheet">


    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <title>Store Manager_ Stocks</title>
</head>
<body>
    <?php
        include "smnavbar.php";
    ?>
    <div class="content">
        <h1>Add Stock Items</h1>

        <form method="post" action="<?php echo BASE_URL; ?>StoreControls/addStockItem" onsubmit="return validateForm()" >
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
    <script>

        function validateForm() {

            // Validate item name
            var itemName = document.getElementById("stockItemName").value.trim();
            if (itemName === "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: 'Please enter item name.'
                });
                return false;
            }

            // Validate item type
            var itemType = document.getElementById("stockItemType").value;
            if (itemType === "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: 'Please select item type.'
                });
                return false;
            }

            // Validate unit of measurement
            var unitOfMeasurement = document.getElementById("stockItemUnit").value;
            if (unitOfMeasurement === "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: 'Please select unit of measurement.'
                });
                return false;
            }

            // Validate minimum amount
            var minimumAmount = document.getElementById("stockItemMin").value.trim();
            if (minimumAmount === "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: 'Please enter minimum amount.'
                });
                return false;
            }
            if (isNaN(minimumAmount) || parseFloat(minimumAmount) <= 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: 'Minimum amount must be a positive number.'
                });
                return false;
            }

            // Validate critical amount
            var criticalAmount = document.getElementById("stockItemCritical").value.trim();
            if (criticalAmount === "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: 'Please enter critical amount.'
                });
                return false;
            }
            if (isNaN(criticalAmount) || parseFloat(criticalAmount) <= 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: 'Critical amount must be a positive number.'
                });
                return false;
            }

            return true; // Form is valid
        }
        
                    // // Validate item name
            // var itemName = document.getElementById("stockItemName").value.trim();
            // if (itemName === "") {
            //     alert("Please enter item name.");
            //     return false;
            // }

            // // Validate item type
            // var itemType = document.getElementById("stockItemType").value;
            // if (itemType === "") {
            //     alert("Please select item type.");
            //     return false;
            // }

            // // Validate unit of measurement
            // var unitOfMeasurement = document.getElementById("stockItemUnit").value;
            // if (unitOfMeasurement === "") {
            //     alert("Please select unit of measurement.");
            //     return false;
            // }

            // // Validate minimum amount
            // var minimumAmount = document.getElementById("stockItemMin").value.trim();
            // if (minimumAmount === "") {
            //     alert("Please enter minimum amount.");
            //     return false;
            // }
            // if (isNaN(minimumAmount) || parseFloat(minimumAmount) <= 0) {
            //     alert("Minimum amount must be a positive number.");
            //     return false;
            // }

            // // Validate critical amount
            // var criticalAmount = document.getElementById("stockItemCritical").value.trim();
            // if (criticalAmount === "") {
            //     alert("Please enter critical amount.");
            //     return false;
            // }
            // if (isNaN(criticalAmount) || parseFloat(criticalAmount) <= 0) {
            //     alert("Critical amount must be a positive number.");
            //     return false;
            // }

    </script>
</body>
</html>
