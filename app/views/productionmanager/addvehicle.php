<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>media/css/form.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>media/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>media/css/navbar.css">
    <style>
        .button {
            border: none;
            color: white;
            padding: 10px;
            text-align: center;
            text-decoration: none; 
            justify-content: center;
            align-items: right;
            font-size: 16px;
            border-radius: 9px;
        }
        
        .blue{
            
            background-color: #3498db;
        }
        
    </style><title>Add Delivery Vehicle</title>
</head>
<body>
    <?php
    require('pmnavbar.php');
    if (isset($error)) {
        echo "<script>
            const showAlert = async () => {
                const SwalwithButton = Swal.mixin({
                    customClass: {
                        confirmButton: 'greenbutton',
                    },
                    buttonsStyling: false
                });

                if (typeof Swal !== 'undefined') {
                    await SwalwithButton.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: '$error',
                        confirmButtonText: 'OK',
                    });
                    window.location.href = '" . BASE_URL . "pmcontrols/addVehicleView';

                } else {
                    alert('$error');
                }
            };

            // Call the async function to show the alert
            showAlert();
        </script>";
    }
    ?>
    <div>
        <h1 style="margin-left:33%; margin-top:30px;"> New Vehicle Registration Form</h1>
    </div>
    <section>
        <div class="form-container">
            <form class="form" method="POST" action="<?php echo BASE_URL;?>pmcontrols/createVehicle" onsubmit="return validateForm()">

                <div class="form-group">
                    <label for="registrationnumber">Registration Number</label>
                    <input type="text" id="registrationnumber" name="registrationnumber" required>
                </div>

                <div class="form-group">
                    <label for="type">Vehicle Type</label>
                    <input type="text" id="type" name="type" required>
                </div>

                <div class="form-group">
                    <label for="modelname">Model Name</label>
                    <input type="text" id="modelname" name="modelname" required>
                </div>

                <div class="form-group">
                    <label for="chassinumber">Chassi Number</label>
                    <input type="text" id="chassinumber" name="chassinumber" required>
                </div>

                <div class="form-group">
                    <label for="enginenumber">Engine Number</label>
                    <input type="text" id="enginenumber" name="enginenumber" required>
                </div>

                <div class="form-group">
                    <label for="capacity">Capacity</label>
                    <input type="text" id="capacity" name="capacity" required>
                </div>

                <input class="bluebutton" type="submit" value="Submit">
            </form>
        </div>
    </section>
    <script>
        function validateForm() {
            var registrationNumber = document.getElementById("registrationnumber").value;
            var chassiNumber = document.getElementById("chassinumber").value;
            var engineNumber = document.getElementById("enginenumber").value;

            var regxPattern = /^([A-Za-z]{3}-\d{4})|([A-Za-z]{2}-\d{4})|(\d{2}-\d{4})$/;

            if (!regxPattern.test(registrationNumber)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid Registration Number',
                    text: 'Please enter a valid registration number',
                    confirmButtonText: 'OK'
                });
                return false;
            }

            if (chassiNumber.length !== 17) {
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid Chassi Number',
                    text: 'Please enter a valid chassi number',
                    confirmButtonText: 'OK'
                });
                return false;
            }

            if (engineNumber.length < 10 || engineNumber.length > 18) {
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid Engine Number',
                    text: 'Please enter a valid engine number',
                    confirmButtonText: 'OK'
                });
                return false;
            }

            return true;
        }
    </script>
</body>
</html>
