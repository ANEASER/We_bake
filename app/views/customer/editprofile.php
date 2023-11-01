<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer Profile</title>
    <link rel="stylesheet" type="text/css" href="http://localhost\we_bake\app\views\customer\customersytles.css">

</head>
<body>
<div class="header">
        <h1>Edit Your Profile</h1>
    </div>
    <div class="container">

       <!-- <?php
        include "sidebar.php"
        ?>
    -->
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
            window.location.href = "customercontrols/editprofiledetails";
}
    function changepassword(){
            window.location.href = "customercontrols/changepassword";
}
</script>
</body>
</html>