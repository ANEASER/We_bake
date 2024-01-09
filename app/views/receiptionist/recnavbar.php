<!DOCTYPE html>
<html lang="en">
<body>

    <h1 > Receptionist Dashboard</h1>
        <ul>
            <li><button onclick="loadDash()">Home</button></li>
            <li><button onclick="loadProfile()">Profile</button></li>
            <li><button onclick="loadHistory()">Purchase History</button></li>
            <li><button onclick="PlaceOrders()">Place Orders</button></li>
            <li><button onclick="logout()">Logout</button></li>
        </ul>


<script>
var BASE_URL = "<?php echo BASE_URL; ?>";

function loadDash() {
    window.location.href = BASE_URL +  "Recieptioncontrols";
}

function loadProfile() {
    window.location.href = BASE_URL +  "Recieptioncontrols/viewProfile";
}

function loadHistory() {
    window.location.href = BASE_URL +  "Recieptioncontrols/viewHistory";
}

function PlaceOrders() {
    window.location.href = BASE_URL +  "Recieptioncontrols/customernumber";
}

function logout() {
    window.location.href = BASE_URL +  "CommonControls/logout";
}

</script>

</body>
</html>
