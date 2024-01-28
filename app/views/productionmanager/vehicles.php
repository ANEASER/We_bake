<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/tables.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/cart.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/navbar.css">
    <title>Vehicle</title>
</head>
<body>
    
    
            <?php
                    require('pmnavbar.php');
            ?>
        
            <button class="formbutton" onclick="add()">Add New Vehicle</button>
            <section style="display:flex;justify-content:space-around; padding-top:3%; width:100%">
            <?php
                    echo '<table>';
                    echo '<tr>
                            <th>Registration Number</th>
                            <th>Type</th>
                            <th>Capacity</th>
                            <th>Availability</th>
                            <th>Chassis Number</th>
                            <th>Vehicle Number</th>
                            <th>Engine Number</th>
                            <th>Model Name</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>';
                        foreach ($vehicles as  $vehicle) {
                                echo '<tr>';
                                echo '<td>' . $vehicle->registrationnumber. '</td>';
                                echo '<td>' . $vehicle->type . '</td>';
                                echo '<td>' . $vehicle->capacity . '</td>';
                                echo '<td>' . $vehicle->availability . '</td>';
                                echo '<td>' . $vehicle->chassinumber . '</td>';
                                echo '<td>' . $vehicle->vehicleno  . '</td>';
                                echo '<td>' . $vehicle->enginenumber . '</td>';
                                echo '<td>' . $vehicle->modelname . '</td>';
                                echo '<td><button class="yellowbutton"  onclick="edit(' . $vehicle->vehicleno . ')">Update</button></td>';
                                echo '<td><button class="redbutton" onclick="del(' . $vehicle->vehicleno . ')">Delete</button></td>';
                                echo '</tr>';
                            }
                        
                        echo'</table>'; ?>
            </section>


    <script>

        var BASE_URL = "<?php echo BASE_URL; ?>";

        function add() {
            window.location.href = BASE_URL +  "PmControls/addVehicle";
        }

        function del(vehicleid) {
            window.location.href = BASE_URL +  "PmControls/deletevehicle/"+vehicleid;
        }

        function edit(vehicleid) {
            window.location.href = BASE_URL +  "PmControls/EditVehicleView/"+vehicleid;
        }
    </script>
</body>
</html>
           