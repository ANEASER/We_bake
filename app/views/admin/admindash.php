<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="http://localhost/we_bake/public/css/main.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add System user</title>
</head>
<body>
    <h1 class="header">Admin dash</h1>
    <div class="container">
        <div class="sub-container navbar" style="display: flex; flex-direction:column;">
            <button class="navbutton" onclick="laodItems()">Items</button>
            <button class="navbutton" onclick="loadOutlets()">Outlets</button>
            <button class="navbutton" onclick="loadStocks()">Stocks</button>
            <button class="navbutton" onclick="loadVehicles()">Vehicles</button>
            <button class="navbutton" onclick="loadUsers()">Users</button>
        </div>

        <div class="sub-container content">
            <?php
                print_r($data);
            ?>
        </div>
    </div>
    <script>
        function laodItems() {
            window.location.href = "AdminControls/loadItemsView";
        }

        function loadOutlets() {
            window.location.href = "AdminControls/loadOutletsView";
        }

        function loadStocks() {
            window.location.href = "AdminControls/loadStocksView";
        }

        function loadVehicles() {
            window.location.href = "AdminControls/loadVehiclesView";
        }

        function loadUsers() {
            window.location.href = "AdminControls/loadUsersView";
        }
    </script>
</body>
</html>