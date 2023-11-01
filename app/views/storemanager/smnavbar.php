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

function loadDash() {
    window.location.href = "http://localhost/We_bake/public/StoreControls";
}

function loadProfile() {
    window.location.href = "StoreControls/viewProfile";
}

function loadSuppliers() {
    window.location.href = "../StoreControls/viewSupplier";
}

function loadStocks() {
    window.location.href = "../StoreControls/viewStocks";
}

function logout() {
            window.location.href = "CommonControls/logout";
        }

</script>

</body>
</html>
