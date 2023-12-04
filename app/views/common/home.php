<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    
    <img src="http://localhost\we_bake\app\views\customer\customermedia\logo.png" style="border-radius: 50%; margin:0 0 0 35%" alt="WE BAKE Logo" width="30%" >
    <button onclick="loadLogin()" class="buttonhome" style="margin-top: 15%">Login</button>
    <button onclick="loadRegister()" class="buttonhome">Register</button>
             
    <script>
        function loadLogin() {
            window.location.href = "http://localhost/we_bake/public/CommonControls/loadLoginView";
        }

        function loadRegister() {
            window.location.href = "http://localhost/we_bake/public/CommonControls/loadRegisterView";
        }

        func

    </script>
</body>
</html>
