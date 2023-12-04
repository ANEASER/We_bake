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
    function editprofiledetails(){
            window.location.href = "http://localhost/we_bake/public/customercontrols/editprofiledetails";
}
    function changepassword(){
            window.location.href = "http://localhost/we_bake/public/customercontrols/changepassword";
}
</script>
</body>
</html>