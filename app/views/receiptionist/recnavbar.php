<!DOCTYPE html>
<html lang="en">
<body>

    <h1 > Receptionist Dashboard</h1>
        <ul>
            <li><button onclick="loadDash()">Home</button></li>
            <li><button onclick="loadProfile()">Profile</button></li>
            <li><button onclick="loadHistory()">Purchase History</button></li>
            <li><button onclick="loadOrders()">Orders</button></li>
            <li><button onclick="logout()">Logout</button></li>
        </ul>


<script>

function loadDash() {
    window.location.href = BASE_URL +  "Recieptioncontrols";
}

function loadProfile() {
    window.location.href = BASE_URL +  "Recieptioncontrols/viewProfile";
}

function loadHistory() {
    window.location.href = BASE_URL +  "Recieptioncontrols/viewHistory";
}

function loadOrders() {
    window.location.href = BASE_URL +  "Recieptioncontrols/viewOrders";
}

function logout() {
    window.location.href = BASE_URL +  "CommonControls/logout";
}

</script>

</body>
</html>
