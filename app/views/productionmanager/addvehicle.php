<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/form.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/navbar.css">
    <title>Add Delivery Vehicle</title>
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
                                window.location.href = '" . BASE_URL . "AdminControls/AddItem';
            
                            } else {
                                alert('$error');
                            }
                        };
            
                        // Call the async function to show the alert
                        showAlert();
                    </script>";
                }
            ?>
        <section>
            <div class="form-container">
                <form class="form" method="POST" action="<?php echo BASE_URL; ?>PmControls/createvehicle" onsubmit="return validateForm()">
                    <div class="form-group">
                        <label for="registrationnumber">Registration Number:</label>
                        <input type="text" id="registrationnumber" name="registrationnumber" required>
                    </div>

                    <div class="form-group">
                        <label for="type">Type:</label>
                        <input type="text" id="type" name="type" required>
                    </div>

                    <div class="form-group">
                        <label for="capacity">Capacity:</label>
                        <input type="number" id="capacity" name="capacity" required>
                    </div>

                    <div class="form-group">
                        <label for="chassinumber">Chassis Number:</label>
                        <input type="text" id="chassinumber" name="chassinumber" required>
                    </div>

                    <div class="form-group">
                        <label for="enginenumber">Engine Number:</label>
                        <input type="text" id="enginenumber" name="enginenumber" required>
                    </div>

                    <div class="form-group">
                        <label for="modelname">Model Name:</label>
                        <input type="text" id="modelname" name="modelname" required>
                    </div>

                    <input class="bluebutton" type="submit" value="Submit">
                </form>
            </div>
        </section>

        <script>
            function validateForm() {
                var registrationNumber = document.getElementById("registrationnumber").value;
                var engineNumber = document.getElementById("enginenumber").value;
                var chassisNumber = document.getElementById("chassinumber").value;

                var regexPattern = /^([A-Za-z]{3}-\d{4})|([A-Za-z]{2}-\d{4})|(\d{2}-\d{4})$/;

                if (!regexPattern.test(registrationNumber)) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Invalid Registration Number',
                        text: 'Please enter a valid registration number',
                        confirmButtonText: 'OK'
                    });
                    return false;
                }

                if (engineNumber.length < 10 || engineNumber.length > 18) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Invalid Engine Number',
                        text: 'Please enter a valid engine number (between 10 and 18 characters)',
                        confirmButtonText: 'OK'
                    });
                    return false;
}

                if (chassisNumber.length !== 17) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Invalid Chassis Number',
                        text: 'Please enter a valid chassis number',
                        confirmButtonText: 'OK'
                    });
                    return false;
                }

                return true;
            }
        </script>
</body>
</html>
