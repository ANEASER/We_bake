<!DOCTYPE html>
<html lang="en">
<body>
    

<div>
    <h1> Outlet Manager Dashboard</h1>
            <ul>
                <li><button onclick = "Outletdash()">Home</button></li>
                <li><button onclick = "PlaceOrder()">Place Order</button></li>
                <li><button onclick = "PurchaseHistory()">Purchase History</button></li>
                <li><button onclick="logout()">Logout</button></li>
            </ul>
    </div>
</div>

<script>

    var BASE_URL = "<?php echo BASE_URL; ?>";

    function PlaceOrder() {
        window.location.href = BASE_URL +  "OutletControls/placeorder"};

    function PurchaseHistory() {
        window.location.href = BASE_URL +  "OutletControls/purchasehistory"};

    function Outletdash() {
        window.location.href = BASE_URL +  "OutletControls/outletdash"};

    function logout() {
        window.location.href = BASE_URL +  "CommonControls/logout";
    }
    
</script>

</body>
</html>
