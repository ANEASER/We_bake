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
            <form class="form" method="POST" action="register">

                <label for="Name">Name:</label>
                <input type="text" name="Name" required>

                <label for="DOB">Date of Birth:</label>
                <input type="date" name="DOB" required>
      
                <label for="contactNo">Contact Number:</label>
                <input type="text" name="contactNo" pattern="[0-9]{10,14}" required>

                <label for="Address">Address:</label>
                <input type="text" name="Address" required>

                <label for="UserName">Username:</label>
                <input type="text" name="UserName" required>

                <label for="Email">Email:</label>
                <input type="email" name="Email" required>

                <label for="Password">Enter Password:</label>
                <input type="password" name="Password1" required>

                <label for="Password">Enter Password Again:</label>
                <input type="password" name="Password2" required>

                <button class="bluebutton" style="width: 200px;" type="submit">Register</button>
            </form>

            <p>Already have account? <button class="greenbutton" onclick="loadLogin()">Login</button></p>
        </div>
        
    </section>


    <script>

        var BASE_URL = "<?php echo BASE_URL; ?>";

        function loadLogin() {
            window.location.href = BASE_URL + "CommonControls/loadLoginView";
        }
    </script>
</body>
</html>
