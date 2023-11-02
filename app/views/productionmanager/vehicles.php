<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://localhost/we_bake/app/views/admin/adminstyle.css">
    <title>Vehicle</title>
</head>
<body style="font-weight: 800">
    
    <div class="container">
        <div class="navbar">
            <h1  class="dashboard">Vehicles</h1>
            <button class="navbutton" onclick="back()">Back</button>
        </div>

        <div class="content">
            <div>
                <button class="formbutton" onclick="add()">Add New Vehicle</button>
            </div>
            <div>
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
                        echo '<td><button  class="formbutton" onclick="edit(' . $vehicle->vehicleno . ')">Update</button></td>';
                        echo '<td><button  class="formbutton" onclick="del(' . $vehicle->vehicleno . ')">Delete</button></td>';
                        echo '</tr>';
                     }
                
                echo'</table>'; ?>
            </div>
        </div>
    </div> 


    <script>
        function back() {
            window.location.href = "http://localhost/we_bake/public/pmControls";
        }

        function add() {
            window.location.href = "http://localhost/we_bake/public/pmControls/addVehicle";
        }

        function edit() {
            window.location.href = "http://localhost/we_bake/public/pmControls/editVehicle";
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
           