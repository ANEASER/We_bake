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


    <section style="margin-top:10px;">
        <p>* If you want to change the delivered and/or expiry dates, please delete and re-enter*</p>
        <div class="form-container">

        <form class="form" method="POST" action="<?php echo BASE_URL; ?>StoreControls/updateSupplies" onsubmit="return validateForm()">

        <input type="hidden" name="id" value="<?php echo $supplies[0]->SupplyID; ?>">

        <div class="form-group">
                <label for="StockItemID">Stock Item ID:</label>
                <input type="text" id="StockItemID" name="StockItemID" placeholder="<?php echo $supplies[0]->StockItemID; ?>" readonly>
        </div>

        <div class="form-group">
                <label for="DeliveredDate">Delivered Date:</label>
                <input type="date" id="DeliveredDate" name="DeliveredDate" value="<?php echo $supplies[0]->DeliveredDate; ?>" readonly>
        </div>

        <div class="form-group">
                <label for="InvoiceNo">Invoice Number:</label>
                <input type="text" id="InvoiceNo" name="InvoiceNo" placeholder="<?php echo $supplies[0]->InvoiceNo; ?>">
        </div>

        <div class="form-group">
                <label for="ExpiryDate">Expiry Date:</label>
                <input type="date" id="ExpiryDate" name="ExpiryDate" value="<?php echo $supplies[0]->ExpiryDate; ?>" readonly>
        </div>

        <div class="form-group">
                <label for="DeliveredQuantity">Delivered Quantity:</label>
                <input type="text" id="DeliveredQuantity" name="DeliveredQuantity" placeholder="<?php echo $supplies[0]->DeliveredQuantity; ?>">
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

        // //Function to validate form and submit

        function validateForm() {
        // Validate Delivered Date
        // var deliveredDate = new Date(document.getElementById("DeliveredDate").value);
        // var currentYear = new Date().getFullYear();
        // if (deliveredDate.getFullYear() !== currentYear) {
        //     Swal.fire({
        //         icon: 'error',
        //         title: 'Validation Error',
        //         text: 'Delivered date should be in the current year.'
        //     });
        //     return false;
        // }

        // Validate Expiry Date
        // var expiryDate = new Date(document.getElementById("ExpiryDate").value);
        // if (expiryDate <= deliveredDate) {
        //     Swal.fire({
        //         icon: 'error',
        //         title: 'Validation Error',
        //         text: 'Expiry date should be after the delivered date.'
        //     });
        //     return false;
            
        // }

        // Validate Delivered Quantity
        var deliveredQuantity = parseInt(document.getElementById("DeliveredQuantity").value);
        if (deliveredQuantity <= 0) {
            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                text: 'Delivered quantity must be a positive number.'
            });
            return false;
        }

        return true; // Form is valid
    }

    // function validateForm() {
    //     //Validate Delivered Date
    //     var deliveredDate = new Date(document.getElementById("DeliveredDate").value);
    //     var currentYear = new Date().getFullYear();
    //     var expiryDate = new Date('<?php echo $supplies[0]->ExpiryDate; ?>');
    //     //If the newly entered deliveru date is a date after the pre entered expire date
    //     if(deliveredDate>expiryDate){ 
    //         Swal.fire({
    //             icon: 'error',
    //             title: 'Validation Error',
    //             text: 'Delivered date should be a date before the expiry date.'
    //         });
    //         return false;
    //     }

    //     //If the newly eneterd delivery date is from a past year 
    //     if (deliveredDate.getFullYear() !== currentYear) {
    //         Swal.fire({
    //             icon: 'error',
    //             title: 'Validation Error',
    //             text: 'Delivered date should be in the current year.'
    //         });
    //         return false;
    //     }

    //     //Validate Expiry Date
    //     var expiryDate = new Date(document.getElementById("ExpiryDate").value);
    //     var olddeliverydate = new Date('<?php echo $supplies[0]->DeliveredDate; ?>');
    //     //If the newly entered expiry date is a date prior to the already entered delivery date
    //     if(expiryDate<=olddeliverydate){
    //         Swal.fire({
    //             icon: 'error',
    //             title: 'Validation Error',
    //             text: 'Expiry date should be after the delivered date.'
    //         });
    //         return false;
    //     }

    //     //checking the compatability of both dates of both were entered
    //     if (expiryDate <= deliveredDate) {
    //         Swal.fire({
    //             icon: 'error',
    //             title: 'Validation Error',
    //             text: 'Expiry date should be after the delivered date.'
    //         });
    //         return false;
            
    //     }

    //     // Validate Delivered Quantity - Delivered quantity can't be zero
    //     var deliveredQuantity = parseInt(document.getElementById("DeliveredQuantity").value);
    //     if (deliveredQuantity <= 0) {
    //         Swal.fire({
    //             icon: 'error',
    //             title: 'Validation Error',
    //             text: 'Delivered quantity must be a positive number.'
    //         });
    //         return false;
    //     }

    //     return true; // Form is valid
    // }
        

    </script>
        
</body>
</html>



