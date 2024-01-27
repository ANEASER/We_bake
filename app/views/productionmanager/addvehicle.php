<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/form.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/navbar.css">
    <title>Add Delivery Vehicle</title>
</head>
<body>
        <?php
                require('pmnavbar.php');
            ?>
        <section>
            <div class="form-container">

            <form class="form" method="POST" action="<?php echo BASE_URL; ?>PmControls/createvehicle">
                <div class="form-group">
                    <label for="registrationnumber">Registration Number:</label>
                    <input type="text" id="registrationnumber" name="registrationnumber" required>
                </div>
                    
                <div class="form-group"> 
                    <label for="type">Type:</label>
                    <input type="text" id="type" name="type" required>
                </div>
                    
                <div class="form-group">
                    <label for="capacity">Capacity:</label>
                    <input type="number" id="capacity" name="capacity" required>
                </div>
                    
                <div class="form-group">
                    <label for="chassinumber">Chassis Number:</label>
                    <input type="text" id="chassinumber" name="chassinumber" required>
                </div>
                    
                <div class="form-group">
                    <label for="enginenumber">Engine Number:</label>
                    <input type="text" id="enginenumber" name="enginenumber" required>
                </div>
                    
                <div class="form-group">
                    <label for="modelname">Model Name:</label>
                    <input type="text" id="modelname" name="modelname" required>
                </div>
                
                    <input class="bluebutton"  type="submit" value="Submit">
                
            </form>
    </div>
</section>
</body>
</html>
