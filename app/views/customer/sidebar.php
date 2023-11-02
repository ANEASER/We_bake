
<!DOCTYPE html>
<html lang="en">
<body style="font-family: 'Poppins', sans-serif;">
<div>
<div class="navbar">
    <h1 class="dashboard"> Customer Dashboard</h1>
            <button onclick="customerdash()">Home</button>
            <button onclick="viewmenu()">View Menu</button>
            <button onclick="viewCart()">View Cart</button>
            <button onclick="purchasehistory()">Purchase History</button>
            <button onclick="makeinquiry()">Make Inquiry</button>
            <button onclick="profile()">Profile</button>
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
function viewmenu(){
            window.location.href = "http://localhost/we_bake/public/customercontrols/viewmenu";
}
    function purchasehistory(){
            window.location.href = "http://localhost/we_bake/public/customercontrols/purchasehistory";
}
    function makeinquiry(){
            window.location.href = "http://localhost/we_bake/public/customercontrols/makeinquiry";
}

function logout() {
    window.location.href = "http://localhost/we_bake/public/CommonControls/logout";
}

function viewCart(){
    window.location.href = "http://localhost/we_bake/public/customercontrols/viewcart";
}

</script>
</body>
</html>
