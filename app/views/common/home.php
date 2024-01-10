<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <button onclick="loadLogin()" class="buttonhome" style="margin-top: 15%">Login</button>
    <button onclick="loadRegister()" class="buttonhome">Register</button>
             
    <script>

        var BASE_URL = "<?php echo BASE_URL; ?>";

        function loadLogin() {
            window.location.href = BASE_URL + "CommonControls/loadLoginView";
        }

        function loadRegister() {
            window.location.href = BASE_URL + "CommonControls/loadRegisterView";
        }

    </script>
</body>
</html>
