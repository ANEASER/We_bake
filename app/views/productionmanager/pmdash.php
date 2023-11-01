<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="http://localhost/we_bake/app/views/admin/adminstyle.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PM</title>
</head>
<body>
    <div class="navbar">
    <h1 class="dashboard">PM dash</h1>
        <ul>
            <li><button class="navbutton" onclick="loadVehicles()">Vehicles</button></li>
        </ul>
    </div>
    <div class="sub-container content">
            <?php
                print_r($data);
            ?>
        </div>
    <script>

        function loadVehicles() {
            window.location.href = "pmControls/loadVehiclesView";
        }

        function logout() {
            window.location.href = "CommonControls/logout";
        }

    </script>
</body>
</html>