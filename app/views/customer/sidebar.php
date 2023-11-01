
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
            <button onclick="logout()">Log Out</button>
        
        
</div>
</div>
<script>
    function customerdash(){
            window.location.href = "http://localhost/we_bake/public/customercontrols/customerdash";
}
    function profile(){
            window.location.href = "http://localhost/we_bake/public/customercontrols/profile";
}
    function placeorder(){
            window.location.href = "http://localhost/we_bake/public/customercontrols/placeorder";
}
    function purchasehistory(){
            window.location.href = "http://localhost/we_bake/public/customercontrols/purchasehistory";
}
    function makeinquiry(){
            window.location.href = "http://localhost/we_bake/public/customercontrols/makeinquiry";
}

function logout(){
            window.location.href = "http://localhost/we_bake/public/customercontrols/logout";
}
</script>
</body>
</html>
