<!DOCTYPE html>
<html lang="en">
<body>
<div class="navbar">
    <h1 class="dashboard"> Store Manager Dashboard</h1>
        <ul>
            <li><button class="navbutton" onclick="loadDash()">Home</button></li>
            <li><button class="navbutton" onclick="loadProfile()">Profile</button></li>
            <li><button class="navbutton" onclick="loadSuppliers()">Suppliers</button></li>
            <li><button class="navbutton" onclick="loadStocks()">Stocks</button></li>
            <li><button class="navbutton" onclick="logout()">Logout</button></li>
        </ul>
</div>

<script>

    var BASE_URL = "<?php echo BASE_URL; ?>";

    function loadDash() {
        window.location.href = BASE_URL +  "StoreControls";
    }

    function loadProfile() {
        window.location.href = BASE_URL +  "StoreControls/viewProfile";
    }

    function loadSuppliers() {
        window.location.href = BASE_URL +  "StoreControls/viewSupplier";
    }

    function loadStocks() {
        window.location.href = BASE_URL +  "StoreControls/viewStocks";
    }

    function logout() {
        window.location.href = BASE_URL +  "CommonControls/logout";
    }

</script>

</body>
</html>
