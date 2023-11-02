<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="http://localhost/we_bake/app/views/admin/adminstyle.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <div class="container">
<?php
        include "adminnav.php"
    ?>
    <div class="sub-container content">
        <img src="https://www.syskit.com/wp-content/uploads/2023/05/Power-BI-Dashboard.png" alt="" style="height: 700px;">        
    </div>
    </div>
    <script>
        function laodItems() {
            window.location.href = "http://localhost/we_bake/public/AdminControls/loadItemsView";
        }

        function loadOutlets() {
            window.location.href = "http://localhost/we_bake/public/AdminControls/loadOutletsView";
        }

        function loadStocks() {
            window.location.href = "http://localhost/we_bake/public/AdminControls/loadStocksView";
        }

        function loadUsers() {
            window.location.href = "http://localhost/we_bake/public/AdminControls/loadUsersView";
        }

        function advertiesments() {
            window.location.href = "http://localhost/we_bake/public/AdminControls/AddAdvertiesment";
        }

        function logout() {
            window.location.href = "http://localhost/we_bake/public/CommonControls/logout";
        }

    </script>
</body>
</html>