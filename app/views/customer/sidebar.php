
<!DOCTYPE html>
<html lang="en">
<body>
<div>
<div class="navbar">
    <h1 class="dashboard"> Customer Dashboard</h1>
            <button onclick="customerdash()">Home</button>
            <button onclick="profile()">Profile</button>
            <button onclick="placeorder()">Place Order</button>
            <button onclick="purchasehistory()">Purchase History</button>
            <button onclick="makeinquiry()">Make Inquiry</button>
        
</div>
</div>
<script>
    function customerdash(){
            window.location.href = "customercontrols/customerdash";
}
    function profile(){
            window.location.href = "customercontrols/profile";
}
    function placeorder(){
            window.location.href = "customercontrols/placeorder";
}
    function purchasehistory(){
            window.location.href = "customercontrols/purchasehistory";
}
    function makeinquiry(){
            window.location.href = "customercontrols/makeinquiry";
}
</script>
</body>
</html>
