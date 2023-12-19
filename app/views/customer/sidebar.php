
<!DOCTYPE html>
<html lang="en">
<body>
<div>
<div >
    <h1> Customer Dashboard</h1>
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

    var BASE_URL = "<?php echo BASE_URL; ?>";

    function customerdash(){
            window.location.href = BASE_URL +  "CustomerControls/customerdash";
    }
    function profile(){
                window.location.href = BASE_URL +  "CustomerControls/profile";
    }
    function viewmenu(){
                window.location.href = BASE_URL +  "CustomerControls/viewmenu";
    }
    function purchasehistory(){
                window.location.href = BASE_URL +  "CustomerControls/purchasehistory";
    }
    function makeinquiry(){
                window.location.href = BASE_URL +  "CustomerControls/makeinquiry";
    }

    function logout() {
        window.location.href = BASE_URL +  "CustomerControls/logout";
    }

    function viewCart(){
        window.location.href = BASE_URL +  "CustomerControls/viewcart";
    }

</script>
</body>
</html>
