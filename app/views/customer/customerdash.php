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
        function viewmenu(){
                window.location.href = "http://localhost/we_bake/public/customercontrols/viewmenu";
        }
        function profile(){
                window.location.href = "http://localhost/we_bake/public/customercontrols/profile";
        }
        function purchasehistory(){
                window.location.href = "http://localhost/we_bake/public/customercontrols/purchasehistory";
        }
        function makeinquiry(){
                window.location.href = "http://localhost/we_bake/public/customercontrols/makeinquiry";
        }
    </script>
</body>
</html>
 