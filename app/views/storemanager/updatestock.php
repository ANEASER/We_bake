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

    <div class="content">
        <h1>Update Stocks</h1>
    </div>

    <section>
        <div class="form-container">

        <form class="form" method="POST" action="<?php echo BASE_URL; ?>StoreControls/updateStocks" onsubmit="return validateForm()">

        <input type="hidden" name="id" value="<?php echo $stocks[0]->ItemID; ?>">

        <div class="form-group">
                <label for="Name">Name:</label>
                <input type="text" id="Name" name="Name" placeholder="<?php echo $stocks[0]->Name; ?>">
        </div>

        <div class="form-group">
                <label for="Type">Type:</label>
                <input type="text" id="Type" name="Type" placeholder="<?php echo $stocks[0]->Type; ?>">
        </div>

        <div class="form-group">
                <label for="Type">Unit of Measurement:</label>
                <input type="text" id="UnitOfMeasurement" name="UnitOfMeasurement" placeholder="<?php echo $stocks[0]->UnitOfMeasurement; ?>">
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
