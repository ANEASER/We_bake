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
    ?>

    <section>  
    <div class="form-container">

            <form class="form" method="POST" action="login" class="formisland"  onsubmit="return loginUser(this)">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <button class="greenbutton">Login</button>
            </form>

            <p>Don't have account? <button class="bluebutton" onclick="loadRegister()">Register</button></p>

    </div>
    </section>
    <script>
        
        var BASE_URL = "<?php echo BASE_URL; ?>";

        function loginUser() {
    
        Swal.fire({
            icon: 'success',
            title: 'Login Successful',
            text: 'Welcome back!',
            timer: 1300, 
            showConfirmButton: false
        }).then(() => {
            sessionStorage.removeItem('activeLink');
            document.forms[0].submit(); 
        });
        return false;
        }

        function loadRegister() {
            window.location.href = BASE_URL + "CommonControls/loadRegisterView";
        }
    </script>
</body>
</html>
