<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
    <link rel="stylesheet" type="text/css" href="http://localhost\we_bake\app\views\customer\customersytles.css">
</head>
<body>
<div class="header">
        <h1>Customer Dashboard</h1>
</div>
<div class="container1">

    <div class="image-container">
        <div >
                <img src="http://localhost\we_bake\app\views\customer\customermedia\viewmenu.jpg.jpg" alt="View Menu" class="image"  width="300" height="300">
                <button onclick="viewmenu()" class="button1">View Menu</button>
        </div>
    </div>
    <div class="image-container">
        <div>
                <img src="http://localhost\we_bake\app\views\customer\customermedia\viewprofile.jpg.avif" alt="Profile" class="image" width="300" height="300">
                <button onclick="profile()" class="button1">Profile</button>
        </div>
    </div>
    
    <div class="image-container">
        <div>
                <img src="http://localhost\we_bake\app\views\customer\customermedia\placeorder.jpg.avif" alt="Place Order" class="image"  width="300" height="300">
                <button onclick="placeorder()" class="button1" >Place Order</button>
        </div>
    </div>

    <div class="image-container">
        <div >
                <img src="http://localhost\we_bake\app\views\customer\customermedia\purchasehistory.jpg.avif" alt="Purchase History" class="image"  width="300" height="300">
                <button onclick="purchasehistory()" class="button1">Purchase History</button>
        </div>
    </div>
    <div class="image-container">
        <div >
                <img src="http://localhost\we_bake\app\views\customer\customermedia\makeinquiry.jpg.avif" alt="Make Inquiry" class="image"  width="300" height="300">
                <button onclick="makeinquiry()" class="button1">Make Inquiry</button>
        </div>
    </div>
   
</div>
<script>
    function viewmenu(){
            window.location.href = "customercontrols/viewmenu";
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
 