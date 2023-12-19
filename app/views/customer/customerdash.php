<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
</head>
<body>

                
    <button onclick="viewmenu()" class="button1">View Menu</button>            
    <button onclick="profile()" class="button1">Profile</button>
    <button onclick="purchasehistory()" class="button1">Purchase History</button>
    <button onclick="makeinquiry()" class="button1">Make Inquiry</button>

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
    </script>
</body>
</html>
 