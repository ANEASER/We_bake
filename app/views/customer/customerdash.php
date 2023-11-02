<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
    <link rel="stylesheet" type="text/css" href="http://localhost\we_bake\app\views\customer\customersytles.css">
</head>
<body style="font-family: 'Poppins', sans-serif;">
<div class="header">
        <h1>Customer Dashboard</h1>
</div>
<div style="display:flex; flex-direction:column;">
<div class="container1">
                
                <button onclick="viewmenu()" class="button1">View Menu</button>
                
                <button onclick="profile()" class="button1">Profile</button>
                
                <button onclick="purchasehistory()" class="button1">Purchase History</button>
       
                <button onclick="makeinquiry()" class="button1">Make Inquiry</button>
</div>

<div class="container1">
    <div>
        <img src="http://localhost\we_bake\app\views\customer\customermedia\buns.avif" alt="Advertistments"  style="margin-left:20px; margin-right:20px;" width="400" height="300">
    </div>
    <div>
        <img src="http://localhost\we_bake\app\views\customer\customermedia\shorteat.avif" alt="Advertistments" style="margin-left:20px; margin-right:20px;"  width="400" height="300">
    </div>
    <div>
        <img src="http://localhost\we_bake\app\views\customer\customermedia\bread.avif" alt="Advertistments"   style="margin-left:20px; margin-right:20px;"width="400" height="300">
    </div>
</div>

    <div  style= "text-decoration: overline; text-align: center; font-weight: bold; ">
        <h1 > About Us</h1>
    </div>
    <div style="display:flex; flex-direction:row;">
    <div >
        <img src="http://localhost\we_bake\app\views\customer\customermedia\logo.png" class="imagelogo"alt="About Us" style="margin-left:20%; margin-right:10%;" >
    </div>
    <div style="text-align:center; margin-left:10%; margin-right:10%">
        <p>Welcome to <b> WE BAKE</b>, where every day begins with the aroma of fresh possibilities. We are more than just a bakery; we are a community of passionate bakers and food enthusiasts dedicated to the craft of creating delectable treats.</p>
        <p>At  <b> WE BAKE</b>, our story revolves around a shared love for baking. We take great pride in using only the finest, locally sourced ingredients to ensure that every product we create is a taste of pure delight. Our bakers pour their heart and soul into each loaf of bread, every pastry, and every cake, making sure that it's not just a meal but an experience.</p>
        <p>Our warm and inviting atmosphere welcomes you to explore our array of handcrafted delicacies. From crusty artisan bread to heavenly desserts, our creations are designed to bring a smile to your face and comfort to your soul. We believe in the power of food to bring people together, and that's why we bake with love and passion.</p>
        <p>Join us at  <b> WE BAKE</b> as we continue to bake memories and moments, one delicious bite at a time.</p>
    </div>
    </div>


    <div  style= "text-decoration: overline; text-align: center; margin-top:3%; font-weight: bold; ">
        <h1 > Contact Us</h1>
    </div>
    <div style="text-align:center; margin-left:10%; margin-right:10%">
        <p> <b>Visit us at : </b> 123, Galle Road, Colombo 03</p>
        <p><b>You can also place your orders through : </b> 011 1234567</p>
        <p><b>To reach us : </b>webake@gmail.com </p>
    </div>
    
</div>
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
 