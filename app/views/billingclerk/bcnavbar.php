<!DOCTYPE html>
<html lang="en">
<body>
<div>
    <h1> Billing clerk Dashboard</h1>
        <ul>
            <li><button class="navbutton" onclick="loadDash()">Home</button></li>
            <li><button class="navbutton" onclick="loadProfile()">Profile</button></li>
            <li><button class="navbutton" onclick="logout()">Logout</button></li>
        </ul>
</div>

<script>

function loadDash() {
    window.location.href = "http://localhost/we_bake/public/billingcontrols";
}

function loadProfile() {
    window.location.href = "http://localhost/We_bake/public/BillingControls/viewProfile";
}

function logout() {
    window.location.href = "http://localhost/We_bake/public/CommonControls/logout";
}

</script>

</body>
</html>
