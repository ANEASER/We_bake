<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://localhost/we_bake/app/views/admin/adminstyle.css">
    <title>Vehicle</title>
</head>
<body>
    
    
            <h1>Vehicles</h1>
        
            <button class="formbutton" onclick="add()">Add New Vehicle</button>

                <?php
            echo '<table style="border-collapse: collapse; width: 100%;">';
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
                        echo '<td><button  onclick="edit(' . $vehicle->vehicleno . ')">Update</button></td>';
                        echo '<td><button  onclick="del(' . $vehicle->vehicleno . ')">Delete</button></td>';
                        echo '</tr>';
                     }
                
                echo'</table>'; ?>
            </div>
        </div>
    </div> 


    <script>

        function add() {
            window.location.href = "http://localhost/we_bake/public/pmControls/addVehicle";
        }

        function del(vehicleid) {
            window.location.href = "http://localhost/we_bake/public/pmControls/deletevehicle/"+vehicleid;
        }

        function edit(vehicleid) {
            window.location.href = "http://localhost/we_bake/public/pmControls/EditVehicleView/"+vehicleid;
        }
    </script>
</body>
</html>
           