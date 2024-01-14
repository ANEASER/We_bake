<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/form.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <title>Edit Profile Details</title>
</head>
<body>
    <?php
        include 'customernav.php';
    ?>
   
    <section>
        <div class="form-container" >
            <form class="form" action="<?php echo BASE_URL; ?>CustomerControls/editprofile" method="post">
                
                <div class="form-group">
                    <label for="username">EDIT USERNAME:</label>
                    <input type="text" name="username" placeholder="<?php echo $_SESSION['USER']->UserName?>"><br>
                </div>
            
            
                <div class="form-group">
                    <label for="dob">EDIT Date of Birth</label>
                    <input type="date" name="dob" placeholder="<?php echo $_SESSION['USER']->DOB?>"><br>
                </div>
                    
                <div class="form-group">
                    <label for="name">EDIT NAME:</label>
                    <input type="text" name="name" placeholder="<?php echo $_SESSION['USER']->Name?>"><br>
                </div>

                <div class="form-group">
                    <label for="address">EDIT ADDRESS</label>
                    <input type="text" name="address" placeholder="<?php echo $_SESSION['USER']->Address?>"><br>
                </div>

                <div class="form-group">
                    <label for="contactNo">EDIT CONTACT NUMBER</label>
                    <input type="text" name="contactNo" placeholder="<?php echo $_SESSION['USER']->contactNo?>" ><br>
                </div>

                <div class="form-group">
                    <label for="password">ENTER PASSWORD</label>
                    <input type="password" name="password" required><br>
                </div>

                
                <input class="bluebutton"  type="submit" value="SUBMIT">
            </form>
        </div>
    </section>
</body>
</html>