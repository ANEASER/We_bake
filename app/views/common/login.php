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
        include '..\app\views\common\commonnav.php';
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
        elseif (isset($message)){
            echo "<script>

            const SwalwithButton = Swal.mixin({
                customClass: {
                    confirmButton: 'greenbutton',
                },
                buttonsStyling: false
            });

            
            if (typeof Swal !== 'undefined') {
                SwalwithButton.fire({
                    icon: 'success',
                    title: 'Success',
                    text: '$message',
                    confirmButtonText: 'OK',
                });
            } else {
                alert('$message');
            }
          </script>";}
    ?>

    <section>  
    <div class="form-container">

            <form class="form" method="POST" action="login" class="formisland">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                    <p>forgot password or username? <span style="text-decoration: underline; cursor:pointer" onclick="resetpassword()">find & reset</span> </p>
                </div>
               
                <button class="greenbutton">Login</button>
            </form>
            
            <br>
            <p>Don't have account? <span style="cursor:pointer; text-decoration: underline;" onclick="loadRegister()">Register</span></p>

    </div>
    </section>
    <script>
        
        var BASE_URL = "<?php echo BASE_URL; ?>";

        sessionStorage.removeItem('activeLink');

        function loadRegister() {
            window.location.href = BASE_URL + "CommonControls/loadRegisterView";
        }

        function resetpassword(){
            console.log("reset password");
            window.location.href = BASE_URL + "CommonControls/FindProfileView";
        }
    </script>
</body>
</html>
