<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
</head>
<body>

                
    <button onclick="viewmenu()">View Menu</button>            
    <button onclick="profile()">Profile</button>
    <button onclick="purchasehistory()">Purchase History</button>
    <button onclick="makeinquiry()">Make Inquiry</button>
    <button onclick="placeorder()">Place order</button>
    <button class="navbutton" onclick="logout()">Log Out</button>

    <script>

        var BASE_URL = "<?php echo BASE_URL; ?>";
        
        function viewmenu(){
                window.location.href = BASE_URL +"CustomerControls/viewmenu";
        }
        function profile(){
                window.location.href = BASE_URL + "CustomerControls/profile";
        }
        function purchasehistory(){
                window.location.href = BASE_URL + "CustomerControls/purchasehistory";
        }
        function makeinquiry(){
                window.location.href = BASE_URL + "CustomerControls/makeinquiry";
        }
        function placeorder(){
                window.location.href = BASE_URL + "CustomerControls/placeorder";
        }
        function logout() {
            window.location.href = BASE_URL +  "CommonControls/logout";
        }


    </script>
</body>
</html>
 