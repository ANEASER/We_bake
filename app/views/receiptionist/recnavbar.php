<!DOCTYPE html>
<html lang="en">
<body>
<div class="navbar">
    <h1 class="dashboard"> Receptionist Dashboard</h1>
        <ul>
            <li><button class="navbutton" onclick="loadDash()">Home</button></li>
            <li><button class="navbutton" onclick="loadProfile()">Profile</button></li>
            <li><button class="navbutton" onclick="loadHistory()">Purchase History</button></li>
            <li><button class="navbutton" onclick="loadOrders()">Orders</button></li>
            <li><button class="navbutton" onclick="logout()">Logout</button></li>
        </ul>
</div>

<script>

function loadDash() {
    window.location.href = "http://localhost/We_bake/public/Recieptioncontrols";
}

function loadProfile() {
    window.location.href = "http://localhost/We_bake/public/Recieptioncontrols/viewProfile";
}

function loadHistory() {
    window.location.href = "http://localhost/We_bake/public/Recieptioncontrols/viewHistory";
}

function loadOrders() {
    window.location.href = "http://localhost/We_bake/public/Recieptioncontrols/viewOrders";
}

function logout() {
    window.location.href = "http://localhost/We_bake/public/CommonControls/logout";
}

</script>

</body>
</html>
