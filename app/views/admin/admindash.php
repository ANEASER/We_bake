<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="http://localhost/we_bake/app/views/admin/adminstyle.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <div class="navbar">
    <h1 class="dashboard">Admin dash</h1>
        <ul>
            <li><button class="navbutton" onclick="laodItems()">Items</button></li>
            <li><button class="navbutton" onclick="loadOutlets()">Outlets</button></li>
            <li><button class="navbutton" onclick="loadStocks()">Stocks</button></li>
            <li><button class="navbutton" onclick="loadUsers()">Users</button></li>
            <li><button class="navbutton" onclick="advertiesments()">Advertiesments</button></li>
            <li><button class="navbutton" onclick="logout()">Logout</button></li>
        </ul>
    </div>
    <div class="sub-container content">
            <?php
                print_r($data);
            ?>
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

        function loadUsers() {
            window.location.href = "AdminControls/loadUsersView";
        }

        function advertiesments() {
            window.location.href = "AdminControls/AddAdvertiesment";
        }

        function logout() {
            window.location.href = "CommonControls/logout";
        }

    </script>
</body>
</html>