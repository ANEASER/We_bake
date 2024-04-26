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

    <title>Store Manager_ Supplies</title>
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

    <div class="content">
        <h1>Update Supplies</h1>
    </div>

    <section>
        <div class="form-container">

        <form class="form" method="POST" action="<?php echo BASE_URL; ?>StoreControls/updateSupplies" onsubmit="return validateForm()">

        <input type="hidden" name="id" value="<?php echo $supplies[0]->SupplyID; ?>">

        <div class="form-group">
                <label for="StockItemID">Stock Item ID:</label>
                <input type="text" id="StockItemID" name="StockItemID" placeholder="<?php echo $supplies[0]->StockItemID; ?>">
        </div>

        <div class="form-group">
                <label for="DeliveredDate">Delivered Date:</label>
                <input type="date" id="DeliveredDate" name="DeliveredDate" placeholder="<?php echo $supplies[0]->DeliveredDate; ?>">
        </div>

        <div class="form-group">
                <label for="InvoiceNo">Invoice Number:</label>
                <input type="text" id="InvoiceNo" name="InvoiceNo" placeholder="<?php echo $supplies[0]->InvoiceNo; ?>">
        </div>

        <div class="form-group">
                <label for="ExpiryDate">Expiry Date:</label>
                <input type="date" id="ExpiryDate" name="ExpiryDate" placeholder="<?php echo $supplies[0]->ExpiryDate; ?>">
        </div>

        <div class="form-group">
                <label for="DeliveredQuantity">Delivered Quantity:</label>
                <input type="text" id="DeliveredQuantity" name="DeliveredQuantity" placeholder="<?php echo $supplies[0]->DeliveredQuantity; ?>">
        </div>

        <input class="yellowbutton" type="submit" value="Update">

        </div>

    </section> 

    <script>

        // //Function to validate form and submit

        // function validateForm() {
        //     // Get form input values
        //     var name = document.getElementById("Name").value;
        //     var type = document.getElementById("Type").value;
        //     var unitOfMeasurement = document.getElementById("UnitOfMeasurement").value;
        //     var minimumStock = document.getElementById("MinimumStock").value;
        //     var criticalStock = document.getElementById("CriticalStock").value;

        //     return true; // Allow form submission
        // 

    </script>
        
</body>
</html>
