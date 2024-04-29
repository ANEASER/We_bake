<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/form.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
</head>
<body>
    
    <?php
        include '..' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'common' . DIRECTORY_SEPARATOR . 'commonnav.php';
    ?>
    <?php
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
            <form  class="form" method="post" action="<?php echo BASE_URL; ?>CommonControls/changeFirsttimePassword">
                <h2>Change Password</h2>
                <br>
                <input type="hidden" name="UserName" value="<?php echo $username; ?>">

                <div class="form-group">
                    <label for="newpassword">New Password</label>
                    <input type="password" name="newpassword" id="newpassword">
                    <br>
                </div>
                <div class="form-group">
                    <label for="confirmpassword">Confirm Password</label>
                    <input type="password" name="confirmpassword" id="confirmpassword">
                    <br>
                </div>
                <input class="bluebutton" style="width: 300px;" type="submit" value="Change Password">
            </form>
        </div>
    </section>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Get reference to password input fields
            var password1Input = document.querySelector('input[name="newpassword"]');
            var password2Input = document.querySelector('input[name="confirmpassword"]');

            // Add event listeners for input validation
            password1Input.addEventListener("input", validatePassword);
            password2Input.addEventListener("input", validatePassword);
        });

        function validatePassword() {
            var password1 = document.querySelector('input[name="newpassword"]').value;
            var password2 = document.querySelector('input[name="confirmpassword"]').value;

            // Check if passwords meet criteria
            var isValidPassword = /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(password1);

            // Update input fields' validity status
            document.querySelector('input[name="newpassword"]').setCustomValidity(isValidPassword ? "" : "Password must contain at least 8 characters, including at least one letter, one number, and one special character.");
            document.querySelector('input[name="confirmpassword"]').setCustomValidity(password1 === password2 ? "" : "Passwords do not match.");
        }
    </script>
</body>
</html>