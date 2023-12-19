<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>


<body>
    <?php
        if (isset($error)){
        echo "<p style='background-color:red; color:white;font-size: large; padding:1%'>$error</p>";}
    ?>

    <div>
            <form method="POST" action="login" class="formisland">
                <div >
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>

                <div>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <button>Login</button>
            </form>

            <p>Don't have account? <button onclick="loadRegister()">Register</button></p>

    </div>

    <script>
        
        var BASE_URL = "<?php echo BASE_URL; ?>";

        function loadRegister() {
            window.location.href = BASE_URL + "CommonControls/loadRegisterView";
        }
    </script>
</body>
</html>
