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
        
        <form class="form" method="POST" action="otpvalidation">
            <h1>Verify Your E-Mail</h1>
            <div class="form-group">
                <label for="otp">Enter the OTP code sent to your Email</label>
                <input type="text" id="otp" name="otp" required>
                <button class="greenbutton" type="submit">confirm</button>
            </div>
        </form>

        <p>did't recieve OTP? <button class="bluebutton" onclick="resend()">Resend</button></p>
    </div>
    </section>
    <script>
        var BASE_URL = "<?php echo BASE_URL; ?>";
        
        function resend() {
            window.location.href = BASE_URL + "CommonControls/otpvalidation";
        }
    </script>

</body>
</html>
