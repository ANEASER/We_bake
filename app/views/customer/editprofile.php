<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer Profile</title>
</head>
<body >


    <button onclick="editprofiledetails()" class="buttonedit">Edit Profile Details</button>

    <button onclick="changepassword()" class="buttonedit">Change Password</button>

    <script>
    
    var BASE_URL = "<?php echo BASE_URL; ?>";
    
    function editprofiledetails(){
                window.location.href = BASE_URL + "CustomerControls/editprofiledetails";
    }
    function changepassword(){
                window.location.href = BASE_URL + "CustomerControls/changepassword";
    }
    </script>
</body>
</html>