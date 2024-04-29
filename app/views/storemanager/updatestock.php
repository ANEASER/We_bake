<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/form.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">

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

<?php
        if(isset($error)){
            echo '<script>
            
            const SwalwithButton = Swal.mixin({
                customClass: {
                    confirmButton: "greenbutton",
                },
                buttonsStyling: false
            });
            
            SwalwithButton.fire({
                icon: "error",
                title: "Oops...",
                text: "'.$error.'",
                confirmButtonText: "OK",
            })</script>';
        }
    ?>

    

    <section style="margin-top:10px;">
        <div class="form-container">

        <form class="form" method="POST" action="<?php echo BASE_URL; ?>StoreControls/updateStocks" onsubmit="return validateForm()">

        <input type="hidden" name="id" value="<?php echo $stocks[0]->ItemID; ?>">

        <div class="form-group">
                <label for="Name">Name:</label>
                <input type="text" id="Name" name="Name" placeholder="<?php echo $stocks[0]->Name; ?>">
        </div>

        <div class="form-group">
                <label for="stockItemType">Item Type:</label>
                <select id="stockItemType" name="Type" placeholder="<?php echo $stocks[0]->Type; ?>">
                    <option value="">Select Item Type</option>
                    <option value="Flour">Flour</option>
                    <option value="Sugar">Sugar</option>
                    <option value="Eggs">Eggs</option>
                    <option value="Dairy">Dairy</option>
                    <option value="Fats and Oils">Fats and Oils</option>
                    <option value="Vegetables">Vegetables</option>
                    <option value="Meat">Meat</option>
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
                <select id="stockItemUnit" name="UnitOfMeasurement" placeholder="<?php echo $stocks[0]->UnitOfMeasurement; ?>">
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
                <label for="Type">Minimum Stock:</label>
                <input type="text" id="MinimumStock" name="MinimumStock" placeholder="<?php echo $stocks[0]->MinimumStock; ?>">
        </div>

        <div class="form-group">
                <label for="Type">Critical Stock:</label>
                <input type="text" id="CriticalStock" name="CriticalStock" placeholder="<?php echo $stocks[0]->CriticalStock; ?>">
        </div>

        <input class="yellowbutton" type="submit" value="Update">

        </form>
         </div>

         <br>
                    <div class="buttongroup">
                        <button class="redbutton" onclick="window.location.href='<?php echo BASE_URL; ?>StoreControls/loadStocksView'">Cancel</button>
                    </div>
    </section> 

    <script>

        //Function to validate form and submit

        function validateForm() {
            // Get form input values
            var name = document.getElementById("Name").value;
            var type = document.getElementById("Type").value;
            var unitOfMeasurement = document.getElementById("UnitOfMeasurement").value;
            var minimumStock = document.getElementById("MinimumStock").value;
            var criticalStock = document.getElementById("CriticalStock").value;


            //Validate Minimum Stock
            if (parseFloat(minimumStock) <= 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Minimum stock must be a positive number greater than 0.'
                });
                return false;
            }

            // Validate Critical Stock
                if (parseFloat(criticalStock) <= 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Critical stock must be a positive number greater than 0.'
                    });
                    return false;
                }

            // // Validate Minimum Stock
            // if (minimumStock === "" || parseFloat(minimumStock) <= 0) {
            //     alert("Minimum stock must be a positive number greater than 0.");
            //     return false;
            // }

            // // Validate Critical Stock
            // if (criticalStock === "" || parseFloat(criticalStock) <= 0) {
            //     alert("Critical stock must be a positive number greater than 0.");
            //     return false;
            // }

            return true; 
        }

    </script>
        
</body>
</html>
