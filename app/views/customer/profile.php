<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Profile</title>
    <link rel="stylesheet" type="text/css" href="http://localhost\we_bake\app\views\customer\customersytles.css">

</head>
<body>
<div class="header">
        <h1>Customer Profile</h1>
    </div>
    <div class="container">

        <?php
        include "sidebar.php"
        ?>
    
    <div class="sub-container" >
        <div>
            <div>
                <button onclick="viewprofile()" class="buttonedit">View Profile</button>
            </div>
            <div>
                <button onclick="editprofile()" class="buttonedit">Edit Profile</button>
            </div>
            
    </div>
<script>
    function viewprofile(){
            window.location.href = "customercontrols/viewprofile";
}
    function editprofile(){
            window.location.href = "customercontrols/editprofile";
}
</script>
</body>
</html>