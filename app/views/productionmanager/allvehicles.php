<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>media/css/tables.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>media/css/cart.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>media/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>media/css/navbar.css">
    <style>
        .button{
            border: none;
            color: white;
            padding: 10px;
            text-align: center;
            text-decoration: none; 
            justify-content: center;
            align-items: right;
            font-size: 16px;
            margin-left:30px;
            border-radius:9px;
        }
        .add{
            background-color: #3498db;
        }
        .view{            
            background-color: #2ecc71;
        }
    </style>
    <title>All Delivery Vehicles</title>
</head>
<body>
    <?php require('pmnavbar.php'); ?>
    <div>
        <h1 style="margin-left:40%; margin-top:30px;">All Delivery Vehicles </h1>

        <a class="button add" onclick="addVehicle()" role="button">Add New Vehicle </a>
    </div>
    <div>
    <table style="margin:auto; margin-top: 30px;">
            <tr>
                <th>Registration Number</th>
                <th>Vehicle Type</th>
                <th>Model Name</th>
                <th>Vehicle Number</th>
                <th>Chassi Number</th>
                <th>Engine Number</th>
                <th>Capacity</th>
                <th>Availability</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            <?php foreach ($vehicles as $vehicle) : ?>
                <?php if ($vehicle->ActiveState == 1 && $vehicle->availability == 1) : ?>
                    <tr>
                        <td><?php echo $vehicle->registrationnumber; ?></td>
                        <td><?php echo $vehicle->type; ?></td>
                        <td><?php echo $vehicle->vehicleno; ?></td>
                        <td><?php echo $vehicle->modelname; ?></td>
                        <td><?php echo $vehicle->chassinumber; ?></td>
                        <td><?php echo $vehicle->enginenumber; ?></td>
                        <td><?php echo $vehicle->capacity; ?></td>
                        <td><?php echo $vehicle->availability; ?></td>
                        <td><button class="yellowbutton" onclick="edit(<?php echo $vehicle->vehicleno; ?>)">Update</button></td>
                        <td><button class="redbutton" onclick="del(<?php echo $vehicle->vehicleno; ?>)">Delete</button></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </table>
    </div>

    <script>
        function addVehicle(){
            window.location.href= BASE_URL +"pmcontrols/addVehicleView";
        }
    </script>
</body>
</html>
