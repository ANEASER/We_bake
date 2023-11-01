<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer Profile</title>
    <link rel="stylesheet" href="http://localhost/we_bake/app/views/outlet/outletmanager.css">

</head>
<body>
    <div class="container">

        <?php
        include "omnavbar2.php"
        ?>
    
    <div class="sub-container" >
        <div>
            <div>
                <button onclick="editprofiledetails()" class="buttonedit">Edit Profile Details</button>
            </div>
            <div>
                <button onclick="changepassword()" class="buttonedit">Change Password</button>
            </div>
    </div>
    <script>
    function editprofiledetails(){
            window.location.href = "outletmanagercontrols/editprofiledetails";
}
    function changepassword(){
            window.location.href = "outletmanagercontrols/changepassword";
}
</script>
</body>
</html>