<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Delivery Vehicle</title>
</head>
<body>
            <h1>Add Delivery Vehicle</h1>

            <form method="POST" action="<?php echo BASE_URL; ?>PmControls/createvehicle">
                
                <label for="registrationnumber">Registration Number:</label><br>
                <input type="text" id="registrationnumber" name="registrationnumber" required><br><br>
                
                <label for="type">Type:</label><br>
                <input type="text" id="type" name="type" required><br><br>
               
                <label for="capacity">Capacity:</label><br>
                <input type="number" id="capacity" name="capacity" required><br><br>
               
                <label for="chassinumber">Chassis Number:</label><br>
                <input type="text" id="chassinumber" name="chassinumber" required><br><br>
                
                <label for="enginenumber">Engine Number:</label><br>
                <input type="text" id="enginenumber" name="enginenumber" required><br><br>
                
                <label for="modelname">Model Name:</label><br>
                <input type="text" id="modelname" name="modelname" required><br><br>
              
                <input  type="submit" value="Submit">
                
            </form>
    </div>
</body>
</html>
