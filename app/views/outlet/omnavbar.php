<!DOCTYPE html>
<html lang="en">
<body>
    
<div class="navbar">
<h1 class="dashboard"> Outlet Manager Dashboard</h1>
        <ul>
           
            <li><button onclick = "Home()">Home</button></li>
            <li><button onclick = "PlaceOrder()">Place Order</button></li>
            <li><button onclick = "PurchaseHistory()">Purchase History</button></li>
            <li><button onclick = "EditContainOrder()">Edit Contain Order</button></li>
            <li><button onclick = "EditProfile()">Edit Profile</button></li>
        </ul>
</div>

<script>
            function Home() {
            window.location.href = "../outletControls/"
            }

            function PlaceOrder() {
            window.location.href = "../outletControls/placeorder"};

            function PurchaseHistory() {
            window.location.href = "../outletControls/purchasehistory"};

            function EditContainOrder() {
            window.location.href = "../outletControls/editcontainorder"};

            function EditProfile() {
            window.location.href = "../outletControls/editprofile"};
        
</script>

</body>
</html>
