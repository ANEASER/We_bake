<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Production Manager Dashboard</title>
   
</head>
<body>
    <h1>PM dash</h1>
    <ul>
        <li><button class="navbutton" onclick="loadVehicles()">Vehicles</button></li>
        <li><button class="navbutton" onclick="logout()">Log Out</button></li>
    </ul>
    
    <script>
        
        var BASE_URL = "<?php echo BASE_URL; ?>";

        function loadVehicles() {
            window.location.href = BASE_URL +  "PmControls/loadVehiclesView";
        }

        function logout() {
            window.location.href = BASE_URL +  "CommonControls/logout";
        }

    </script>
</body>
</html>