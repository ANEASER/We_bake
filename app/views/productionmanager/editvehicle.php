<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/form.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/navbar.css">
    <title>Edit Delivery Vehicle</title>
</head>
<body>
        <?php
                require('pmnavbar.php');
            ?>
        <section>
            <div class="form-container">
            <form class="form" method="POST" action="<?php echo BASE_URL; ?>PmControls/editvehicle">

                    <input type="hidden" name="id" value="<?php echo $data[0]->vehicleno; ?>">
                <div class="form-group">
                    <label for="registrationnumber">Registration Number:</label>
                    <input type="text" id="registrationnumber" name="registrationnumber" placeholder="<?php echo $data[0]->type; ?>">
                </div>
                    
                <div class="form-group"> 
                    <label for="type">Type:</label>
                    <input type="text" id="type" name="type" placeholder="<?php echo $data[0]->vehicleno; ?>">
                </div>
                    
                <div class="form-group"> 
                    <label for="capacity">Capacity:</label>
                    <input type="number" id="capacity" name="capacity" placeholder="<?php echo $data[0]->capacity; ?>">
                </div>
                    
                <div class="form-group"> 
                    <label for="availability">Availability:</label>
                    <select id="availability" name="availability" >
                        <option value="1">Available</option>
                        <option value="0">Not Available</option>
                    </select>
                </div>
                    
                <div class="form-group"> 
                    <label for="chassinumber">Chassis Number:</label>
                    <input type="text" id="chassinumber" name="chassinumber" placeholder="<?php echo $data[0]->chassinumber; ?>">
                </div>
                    
                <div class="form-group"> 
                    <label for="enginenumber">Engine Number:</label>
                    <input type="text" id="enginenumber" name="enginenumber" placeholder="<?php echo $data[0]->enginenumber; ?>">
                </div>
                    
                <div class="form-group"> 
                    <label for="modelname">Model Name:</label>
                    <input type="text" id="modelname" name="modelname" placeholder="<?php echo $data[0]->modelname; ?>">
                </div>
                    
                <input class="bluebutton" type="submit" value="Submit">

            </form>
        </div>
    </section>
</body>
</html>
