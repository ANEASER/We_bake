<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http:\\localhost\we_bake\app\views\common\commonstyles.css">
    <title>Home</title>
</head>
<body>
    
    <div class="container">
        <div class="left-container">
            <img src="http://localhost\we_bake\app\views\customer\customermedia\logo.png" style="overflow: hidden; border-radius: 50%; border: 1px solid #897546; object-fit: cover;" alt="WE BAKE Logo" width="300" height="300">
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
