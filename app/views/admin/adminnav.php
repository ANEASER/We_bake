<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <div>
    <h1>Admin Dashboard</h1>
        <ul>
            <li><button class="navbutton" onclick="laodItems()">Items</button></li>
            <li><button class="navbutton" onclick="loadOutlets()">Outlets</button></li>
            <li><button class="navbutton" onclick="loadStocks()">Stocks</button></li>
            <li><button class="navbutton" onclick="loadUsers()">Users</button></li>
            <li><button class="navbutton" onclick="advertiesments()">Advertiesments</button></li>
            <li><button class="navbutton" onclick="logout()">Logout</button></li>
        </ul>
    </div>
    <script>
        function laodItems() {
            window.location.href = BASE_URL + "AdminControls/loadItemsView";
        }

        function loadOutlets() {
            window.location.href = BASE_URL + "AdminControls/loadOutletsView";
        }

        function loadStocks() {
            window.location.href = BASE_URL + "AdminControls/loadStocksView";
        }

        function loadUsers() {
            window.location.href = BASE_URL + "AdminControls/loadUsersView";
        }

        function advertiesments() {
            window.location.href = BASE_URL + "AdminControls/AddAdvertiesment";
        }

        function logout() {
            window.location.href = BASE_URL + "CommonControls/logout";
        }

    </script>
</body>
</html>