<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Outlet Manager Profile</title>
    <link rel="stylesheet" href="http://localhost/we_bake/app/views/outlet/outletmanager.css">

</head>
<body>
<!--<div class="header">
        <h1>Edit Your Profile</h1>
    </div>-->
    <div class="container">

        <?php
        include "omnavbar2.php"
        ?>
    
    <div class="sub-container" >
        <div>
        <h1 style="text-align:center;">Edit Your Profile</h1>

            <div>
                <button onclick="editoutletmanagerprofiledetails()" class="buttonedit">Edit Outlet Manager Profile Details</button>
            </div>
            <div>
                <button onclick="outletmanagerchangepassword()" class="buttonedit"> Outlet Manager Change Password</button>
            </div>
    </div>
    <script>
  function editprofiledetails(){
    window.location.href = "http://localhost/we_bake/public/outletmanagercontrols/editoutletmanagerprofiledetails";
}
    function changepassword(){
        window.location.href = "http://localhost/we_bake/public/outletmanagercontrols/outletmanagerchangepassword";
}
</script>
</body>
</html>