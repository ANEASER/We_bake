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

    <title>Login</title>
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

            <form class="form" method="POST" action="resetpassword" class="formisland">
                <div class="form-group">
                    <label for="password">Enter New Password:</label>
                    <input type="password" id="password1" name="password1" required>
                </div>

                <div class="form-group">
                    <label for="password">Enter Password Again:</label>
                    <input type="password" id="password2" name="password2" required>
                </div>
               
                <button class="greenbutton">Reset</button>
            </form>

    </div>
    </section>
    <script>
         document.addEventListener("DOMContentLoaded", function() {
            
            var password1Input = document.querySelector('input[name="Password1"]');
            var password2Input = document.querySelector('input[name="Password2"]');

            
            password1Input.addEventListener("input", validatePassword);
            password2Input.addEventListener("input", validatePassword);
        });

        function validatePassword() {
            var password1 = document.querySelector('input[name="Password1"]').value;
            var password2 = document.querySelector('input[name="Password2"]').value;

            
            var isValidPassword = /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(password1);

            
            document.querySelector('input[name="Password1"]').setCustomValidity(isValidPassword ? "" : "Password must contain at least 8 characters, including at least one letter, one number, and one special character.");
            document.querySelector('input[name="Password2"]').setCustomValidity(password1 === password2 ? "" : "Passwords do not match.");
        }
    </script>
</body>
</html>
