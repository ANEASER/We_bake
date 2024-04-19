<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/form.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/cart.css">

    <title>Edit Profile Details</title>
</head>
<body>
    <?php
        include 'customernav.php';
    ?>

    <style>
            .editsection {
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                margin: 2% 3% 3% 3%;
                background-color: antiquewhite;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                color: rgb(95, 37, 37);
            }

            .buttongroup {
                display: flex;
                width: 200px;
                flex-direction: column;
            }
    </style>
    
    <section class="editsection">
        <div style="width: 50%;padding-left:3%">
                <h1>EDIT PROFILE DETAILS</h1>
                <br>
                <div>
                                <?php 
                                    if(isset($_SESSION["USER"]->profilepic)){
                                        $profilePic = $_SESSION["USER"]->profilepic;
                                        if (base64_decode($profilePic, true) !== false) {
                                            echo "<img src='data:image/jpeg;base64," . $profilePic . "' height=300px width=255px onclick='enlargeImage(this)'>";
                                        } else {
                                            echo "Invalid base64 encoded image.";
                                        }
                                    } else {
                                        echo "<img src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmRLRMXynnc7D6-xfdpeaoEUeon2FaU0XtPg&usqp=CAU' style='border-radius: 80px' alt='propic' height='100px' width='100px'>";
                                    }
                                ?>
                    </div>
                    <br>
                    <div>
                        <p><?php echo $_SESSION["USER"]->Name; ?></p>
                        <p><?php echo $_SESSION["USER"]->Address; ?></p>
                        <p><?php echo $_SESSION["USER"]->contactNo; ?></p>
                        <p><?php echo $_SESSION["USER"]->Email; ?></p>
                    </div>
                    <br>
                    <div style="display: flex; justify-content:center">
                        <button class="brownbutton" onclick="uploadprofilepic()">Edit Profile Picture</button>
                        <button class="brownbutton" onclick="changepassword()" class="buttonedit">Change Password</button>
                    </div>
             </div>
            
        </div>
        
        <div style="width: 50%;">
            <form class="form" action="<?php echo BASE_URL; ?>CustomerControls/editprofile" method="post">
                
                <div class="form-group">
                    <label for="username">EDIT USERNAME:</label>
                    <input type="text" name="username" value="<?php echo $_SESSION['USER']->UserName?>"><br>
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
    <script>

    </script>
</body>
</html>