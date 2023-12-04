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

function PlaceOrder() {
    window.location.href = "http://localhost/we_bake/public/outletControls/placeorder"};

function PurchaseHistory() {
    window.location.href = "http://localhost/we_bake/public/outletControls/purchasehistory"};

function Outletdash() {
    window.location.href = "http://localhost/we_bake/public/outletControls/outletdash"};

    function logout() {
    window.location.href = "http://localhost/We_bake/public/CommonControls/logout";
}
</script>

</body>
</html>
