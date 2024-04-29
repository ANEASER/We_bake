<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/form.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.min.css" rel="stylesheet">

    <title>Customer Registration</title>
</head>
<body>
    <?php
        include '..' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'common' . DIRECTORY_SEPARATOR . 'commonnav.php';
        if (isset($error)){
            echo "<script>

            const SwalwithButton = Swal.mixin({
                customClass: {
                    confirmButton: 'greenbutton',
                },
                buttonsStyling: false
            });

            
            if (typeof Swal !== 'undefined') {
                SwalwithButton.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '$error',
                    confirmButtonText: 'OK',
                });
            } else {
                alert('$error');
            }
          </script>";}
    ?>

    <section>
        
        <div class="form-container">
            <form class="form" method="POST" action="register">

                <div class="form-group">      
                    <label for="Name">Name:</label>
                    <input type="text" name="Name" required>
                </div>

                <div class="form-group">
                    <label for="DOB">Date of Birth:</label>
                    <input type="date" name="DOB" max="<?php echo date('Y-m-d', strtotime('-16 years')); ?>" required>

                </div>

                <div class="form-group">
                    <label for="contactNo">Contact Number:</label>
                    <input type="text" name="contactNo" pattern="[0-9]{10,14}" required>
                </div>
                    
                <div class="form-group">
                    <label for="Address">Address:</label>
                    <input type="text" name="Address" required>
                </div>

                <div class="form-group">
                    <label for="UserName">Username:</label>
                    <input type="text" name="UserName" required>
                </div>

                <div class="form-group">
                    <label for="Email">Email:</label>
                    <input type="email" name="Email" required>
                </div>

                <div class="form-group">
                    <label for="Password">Enter Password:</label>
                    <input type="password" name="Password1" required>
                </div>

                <div class="form-group">
                    <label for="Password">Enter Password Again:</label>
                    <input type="password" name="Password2" required>
                </div>
                    <button class="bluebutton" style="width: 200px;" type="submit">Register</button>
            </form>
            <br>

            <p>Already have account? <span style="cursor:pointer; text-decoration: underline;" onclick="loadLogin()">Login</span></p>
        </div>
        
    </section>


    <script>
        var BASE_URL = "<?php echo BASE_URL; ?>";

        function loadLogin() {
            window.location.href = BASE_URL + "CommonControls/loadLoginView";
        }

        document.addEventListener("DOMContentLoaded", function() {
            // Get reference to password input fields
            var password1Input = document.querySelector('input[name="Password1"]');
            var password2Input = document.querySelector('input[name="Password2"]');

            // Add event listeners for input validation
            password1Input.addEventListener("input", validatePassword);
            password2Input.addEventListener("input", validatePassword);
        });

        function validatePassword() {
            var password1 = document.querySelector('input[name="Password1"]').value;
            var password2 = document.querySelector('input[name="Password2"]').value;

            // Check if passwords meet criteria
            var isValidPassword = /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(password1);

            // Update input fields' validity status
            document.querySelector('input[name="Password1"]').setCustomValidity(isValidPassword ? "" : "Password must contain at least 8 characters, including at least one letter, one number, and one special character.");
            document.querySelector('input[name="Password2"]').setCustomValidity(password1 === password2 ? "" : "Passwords do not match.");
        }
    </script>

</body>
</html>
