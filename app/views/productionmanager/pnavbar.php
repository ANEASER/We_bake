<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Production Manager Dashboard</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/we_bake/app/views/admin/adminstyle.css">
</head>
<body>
<div class="navbar">
    <h1 class="dashboard">Production <br>Manager<br> Dashboard</h1>
        <ul>
            <li><button class="navbutton" onclick="loadVehicles()">Vehicles</button></li>
            <li><button class="navbutton" onclick="logout()">Log Out</button></li>
        </ul>
    </div>
    <script>

        function loadVehicles() {
            window.location.href = "http://localhost/we_bake/public/pmControls/loadVehiclesView";
        }

        function logout() {
            window.location.href = "http://localhost/we_bake/public/CommonControls/logout";
        }

    </script>
</body>
</html>