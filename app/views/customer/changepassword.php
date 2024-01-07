<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/form.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
</head>
<body>
    
    <?php
        include 'customernav.php';
    ?>
    <section>
        <div class="form-container">
            <form  class="form" method="post" action="<?php echo BASE_URL; ?>CustomerControls/changepassword">
                <div class="form-group">    
                    <label for="currentpassword">Current Password</label>
                    <input type="password" name="currentpassword" id="currentpassword">
                    <br>
                </div>
                <div class="form-group">
                    <label for="newpassword">New Password</label>
                    <input type="password" name="newpassword" id="newpassword">
                    <br>
                </div>
                <div class="form-group">
                    <label for="confirmpassword">Confirm Password</label>
                    <input type="password" name="confirmpassword" id="confirmpassword">
                    <br>
                </div>
                <input class="bluebutton" style="width: 300px;" type="submit" value="Change Password">
            </form>
        </div>
    </section>
</body>
</html>