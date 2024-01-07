<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
</head>
<body>
    <h1>Change Password</h1>
    <?php
        echo $_SESSION["USER"]->UserName;
    ?>
    <form method="post" action="<?php echo BASE_URL; ?>CustomerControls/changepassword">
        <label for="currentpassword">Current Password</label>
        <input type="password" name="currentpassword" id="currentpassword">
        <br>
        <label for="newpassword">New Password</label>
        <input type="password" name="newpassword" id="newpassword">
        <br>
        <label for="confirmpassword">Confirm Password</label>
        <input type="password" name="confirmpassword" id="confirmpassword">
        <br>
        <input type="submit" value="Change Password">
    </form>
</div>
</body>
</html>