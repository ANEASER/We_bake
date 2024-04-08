<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/tables.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/cart.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/form.css">
    <title>Pro Pic</title>
</head>
<body>
    <?php include "customernav.php"; ?>
    <section>
        <div class="form-container">

            <form class="form" action="<?php echo BASE_URL; ?>CustomerControls/uploadproof" method="post" enctype="multipart/form-data">
                
                <input type="hidden" name="username" value="<?php echo $_SESSION["USER"]->UserName; ?>">
                <div class="form-group">  
                    <label for="image">Upload Profile Pic</label>
                </div>
                <div class="form-group">
                    <?php 
                        if(isset($_SESSION["USER"]->profilepic)){
                            $profilePic = $_SESSION["USER"]->profilepic;
                            if (base64_decode($profilePic, true) !== false) {
                                echo "<img src='data:image/jpeg;base64," . $profilePic . "' height=200px width=170px";
                            } else {
                                echo "Invalid base64 encoded image.";
                            }
                        } else {
                            echo "<img src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmRLRMXynnc7D6-xfdpeaoEUeon2FaU0XtPg&usqp=CAU' style='border-radius: 80px' alt='propic' height='100px' width='100px'>";
                        }
                    ?>
                </div>
                <div class="form-group">  
                    <input type="file" name="image" id="image">
                </div>
                <input type="submit" value="Upload" class="bluebutton">
            </form>
        </div>
    </section>
</body>
</html>