<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Vehicle</title>
</head>
<body>
    <h1>Assign Vehicle</h1>

        <?php
            echo $orderid;
          
        ?>
        <?php
            echo '<table>';
            echo '<tr>
                  <th>Vehicle Number</th>
                  <th>Registration Number</th>
                  <th>Type</th>
                  <th>Capacity</th>
                  <th>Model Name</th>
                  <th>Assighn</th>
            </tr>';

            foreach ($vehicles as $vehicle) {
                echo '<tr>';
                echo '<td>' . $vehicle->vehicleno . '</td>';
                echo '<td>' . $vehicle->registrationnumber . '</td>';
                echo '<td>' . $vehicle->type . '</td>';
                echo '<td>' . $vehicle->capacity . '</td>';
                echo '<td>' . $vehicle->modelname . '</td>';
                echo '<td> <button onclick="Assign(\'' . $vehicle->vehicleno . '\', \'' . $orderid . '\')">Assign</button> </td>';
                
                echo '</tr>';
            }

            echo '</table>';
        ?>
    <script>
        var BASE_URL = "<?php echo BASE_URL; ?>";

        function Assign(vehicleno, orderid){
            window.location.href = BASE_URL + "PmControls/assignvehicle/" + vehicleno + "/" + orderid;
        }
    </script>
</body>
</html>