<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http:\\localhost\we_bake\app\views\common\commonstyles.css">
    <title>Home</title>
</head>
<body>
    <!--<h1>HOME</h1>
    
    <button onclick="loadLogin()">Login</button>

    <button onclick="loadRegister()">Register</button>-->
    <div class="container">
        <div class="left-container">
            <img src="your-logo.png" alt="WE BAKE Logo" class="logo">
            <h1>WE BAKE</h1>
        </div>
        <div class="right-container">
            
            <button onclick="loadLogin()" class="buttonhome" style="margin-top: 30%">Login</button>
            <button onclick="loadRegister()" class="buttonhome">Register</button>
            
        </div>
    </div>

    
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
