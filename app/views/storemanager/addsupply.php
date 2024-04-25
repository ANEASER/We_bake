<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/form.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/button.css">

    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <title>Store Manager_ Supplies</title>
</head>
<body>
    <?php
        include "smnavbar.php";
    ?>
    <div class="content">
        <h1>Add New Supply</h1>

        <div class="form-container">
        <form class="form" method="post" action="<?php echo BASE_URL; ?>StoreControls/insertSupply" onsubmit="return validateForm()" >
        
        

            
            <input type="hidden" id="StockItemID" name="StockItemID" value="<?php echo $stocks[0]->ItemID; ?>" >
            

            <div class="form-group">
                <label for="CustomStockItemID">Item ID:</label>
                <input type="text" id="CustomStockItemID" name="CustomStockItemID" value="<?php echo $stocks[0]->CustomItemID; ?>" >
            </div>


            <div class="form-group">
                <label for="stockItemName">Item Name:</label>
                <input type="text" id="stockItemName" name="stockItemName" value="<?php echo $stocks[0]->Name; ?>" required>
            </div>

            <div class="form-group">
                <label for="DeliveredDate">Delivered Date:</label>
                <input type="date" id="DeliveredDate" name="DeliveredDate"required>
            </div>

            <div class="form-group">
                <label for="InvoiceNo">Invoice No.:</label>
                <input type="text" id="InvoiceNo" name="InvoiceNo"required>
            </div>

            <div class="form-group">
                <label for="ExpiryDate">Batch Expiry Date:</label>
                <input type="date" id="ExpiryDate" name="ExpiryDate"required>
            </div>

            <div class="form-group">
                <label for="DeliveredQuantity">Delivered Quantity:</label>
                <input type="text" id="DeliveredQuantity" name="DeliveredQuantity"required>
            </div>

            
            <button class="yellowbutton" type="submit">Save</button>
          
        </form>
        </div>
    </div>

    <script>
        function validateForm() {
            // Get form input values
            var deliveredDate = new Date(document.getElementById("DeliveredDate").value);
            var expiryDate = new Date(document.getElementById("ExpiryDate").value);
            var deliveredQuantity = parseFloat(document.getElementById("DeliveredQuantity").value);

            // Validate Delivery Date
            var currentYear = new Date().getFullYear();
            if (deliveredDate.getFullYear() !== currentYear) {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: 'Delivery date should be in the current year.'
                });
                return false;
            }

            // Validate Expiry Date
            if (expiryDate <= deliveredDate) {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: 'Expiry date should be after the delivery date.'
                });
                return false;
            }

            // Validate Delivered Quantity
            if (isNaN(deliveredQuantity) || deliveredQuantity <= 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: 'Delivered quantity must be a positive number.'
                });
                return false;
            }

            // All validations passed
            return true;
        }
    </script>

</body>
</html>
