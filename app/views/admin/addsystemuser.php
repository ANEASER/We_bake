<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/form.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <title>Add System user</title>
</head>
<body>
    
    <div>
    <?php
        include "adminnav.php";

        
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
                    window.location.href = '" . BASE_URL . "AdminControls/AddUser';

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

                <form class="form" method="POST" action="<?php echo BASE_URL; ?>AdminControls/addsystemuser">

                    <div class="form-group">
                        <label for="Name">Name:</label>
                        <input type="text" id="Name" name="Name" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="NIC">NIC:</label>
                        <input type="text" id="NIC" name="NIC" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="DOB">Date of Birth:</label>
                        <input type="date" id="DOB" name="DOB"  max="<?php echo date('Y-m-d', strtotime('-17 years')); ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="Email">Email:</label>
                        <input type="email" id="Email" name="Email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="contactNo">Contact No:</label>
                        <input type="text" id="contactNo" name="contactNo" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="Address">Address:</label>
                        <input type="text" id="Address" name="Address" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="Role">Role:</label>
                        <select id="Role" name="Role" required>
                            <option value="billingclerk">Billing Clerk</option>
                            <option value="outletmanager">Outlet Manager</option>
                            <option value="productionmanager">Production Manager</option>
                            <option value="receptionist">Receptionist</option>
                            <option value="storemanager">Store Manager</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="UserName">Username:</label>
                        <input type="text" id="UserName" name="UserName" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="Password">Password:</label>
                        <input type="password" id="Password1" name="Password1" required>
                    </div>
                    
                        <input class="bluebutton" type="submit" value="Submit">
                    
                </form>
            </div>
        </section>
        <script>
    // Function to validate email
    function validateEmail() {
        var email = document.getElementById('Email').value;
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    // Function to validate date of birth (DOB)
    function validateDOB() {
        var dob = document.getElementById('DOB').value;
        // Add your custom validation logic for DOB if needed
        // For example, you can check if the user is above a certain age
        return true; // Replace with your validation logic
    }

    // Function to validate NIC
    function validateNIC() {
        var nic = document.getElementById('NIC').value;
        // Add your custom validation logic for NIC if needed
        return true; // Replace with your validation logic
    }

    // Function to perform overall form validation
    function validateForm() {
        var isEmailValid = validateEmail();
        var isDOBValid = validateDOB();
        var isNICValid = validateNIC();

        // Perform additional validations if needed

        // Display error messages or prevent form submission based on validation results
        if (!isEmailValid) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Please enter a valid email address.',
            });
            return false;
        }

        if (!isDOBValid) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Employee at least 18 years old to register.',
            });
            return false;
        }

        if (!isNICValid) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Please enter a valid NIC.',
            });
            return false;
        }

        // If all validations pass, allow form submission
        return true;
    }
</script>
    </div>
    
</body>
</html>
