<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>HOME</h1>
    
    <button onclick="loadLogin()">Login</button>

    <button onclick="loadRegister()">Register</button>
    
    <script>
        function loadLogin() {
            window.location.href = "CommonControls/loadLoginView";
        }

        function loadRegister() {
            window.location.href = "CommonControls/loadRegisterView";
        }

    </script>
</body>
</html>
