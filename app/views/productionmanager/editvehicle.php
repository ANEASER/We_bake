<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Delivery Vehicle</title>
</head>
<body style="font-weight: 800">

            <h1>Edit Delivery Vehicle</h1>
           
            <form method="POST" action="http://localhost/we_bake/public/PmControls/editvehicle">

                <input type="hidden" name="id" value="<?php echo $data[0]->vehicleno; ?>">

                    <label for="registrationnumber">Registration Number:</label><br>
                    <input type="text" id="registrationnumber" name="registrationnumber" placeholder="<?php echo $data[0]->type; ?>"><br><br>

                    <label for="type">Type:</label><br>
                    <input type="text" id="type" name="type" placeholder="<?php echo $data[0]->vehicleno; ?>"><br><br>

                    <label for="capacity">Capacity:</label><br>
                    <input type="number" id="capacity" name="capacity" placeholder="<?php echo $data[0]->capacity; ?>"><br><br>
  
                    <label for="availability">Availability:</label><br>
                    <select id="availability" name="availability" >
                        <option value="1">Available</option>
                        <option value="0">Not Available</option>
                    </select><br><br>
   
                    <label for="chassinumber">Chassis Number:</label><br>
                    <input type="text" id="chassinumber" name="chassinumber" placeholder="<?php echo $data[0]->chassinumber; ?>"><br><br>

                    <label for="enginenumber">Engine Number:</label><br>
                    <input type="text" id="enginenumber" name="enginenumber" placeholder="<?php echo $data[0]->enginenumber; ?>"><br><br>

                    <label for="modelname">Model Name:</label><br>
                    <input type="text" id="modelname" name="modelname" placeholder="<?php echo $data[0]->modelname; ?>"><br><br>

                    <input type="submit" value="Submit">

            </form>
</body>
</html>
