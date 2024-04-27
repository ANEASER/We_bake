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

            <form class="form" method="POST" action="ShowFoundProfile" class="formisland">
                <div class="form-group">
                    <label for="usernameemail"> Username or Email :</label>
                    <input type="text" id="username" name="usernameemail" required>
                </div>

                
                <button class="greenbutton">Find</button>
            </form>
            
            <br>
    </div>
    </section>
</body>
</html>
