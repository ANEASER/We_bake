<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Profile</title>
    <link rel="stylesheet" type="text/css" href="http://localhost\we_bake\app\views\customer\customersytles.css">

</head>
<body style="font-family: 'Poppins', sans-serif;">
<!--<div class="header">
        <h1>Customer Profile</h1>
    </div>-->
    <div class="container">

        <?php
        include "sidebar.php"
        ?>
    
    <div class="sub-container" >
    <h1 style="text-align:center;">Customer Profile</h1>
        <div>
            
            <div>
                <button onclick="editprofile()" class="buttonprofile">Edit Profile</button>
            </div>
            
    </div>
<script>
    

    function editprofile(){
            window.location.href = "http://localhost/we_bake/public/customercontrols/editprofile";
}
</script>
</body>
</html>