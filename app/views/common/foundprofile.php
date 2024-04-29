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
    <style>
        img.rounded {
        border-radius: 100px;
    }
    </style>
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

           <div>
                <?php
                    echo "<h1>User Found</h1>";
                    echo "<br>";
                    echo "<img src='data:image/jpeg;base64," .$user->profilepic. "' height=200px width=200px class='rounded' onclick='enlargeImage(this)'>";
                    echo "<br>";
                ?>
                <div>
                    <?php
                        echo "<h1>".$user->Name."</h1>";
                    ?>
                    <h4>Is this You?</h4>
                </div>
           </div>
           <style>
                button{
                    width: 100px;
                }
           </style>
           <section class="buttongroup" style="display:flex; justify-content:center">
                <button class="greenbutton" onclick="thisisme()">Yes</button>
                <button class="yellowbutton" onclick="thisisnotme()">This Not Me</button>
           </section>
    </div>
    </section>

    <script>
        function thisisme(){
            window.location.href = "<?php echo BASE_URL; ?>CommonControls/ValidateProfileView";
        }

        function thisisnotme(){
            window.location.href = "<?php echo BASE_URL; ?>CommonControls/FindProfileView";
        }

    </script>
</body>
</html>
