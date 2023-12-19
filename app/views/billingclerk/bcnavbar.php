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

    var BASE_URL = "<?php echo BASE_URL; ?>";

    function loadDash() {
        window.location.href = BASE_URL +"public/BillingControls";
    }

    function loadProfile() {
        window.location.href = BASE_URL + "BillingControls/viewProfile";
    }

    function logout() {
        window.location.href = BASE_URL + "CommonControls/logout";
    }

</script>

</body>
</html>
