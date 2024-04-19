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
        .button {
            border: none;
            color: white;
            padding: 10px;
            text-align: center;
            text-decoration: none; 
            justify-content: center;
            align-items: right;
            font-size: 16px;
            margin-left: 30px;
            border-radius: 9px;
        }
        .red{
            background-color: #e74c3c;
        }
        .green{
            background-color: #2ecc71;
        }
        .blue{
            background-color: #3498db;
        }
        .yellow{
            background-color: #f1c40f;
        }
    </style>
    <title>Vehicles</title>
</head>
<body>
    <?php
    require('pmnavbar.php');
    ?>

<h1 style="margin-left:40%; margin-top:20px;">Vehicle Availability</h1>

    <div class="searchpanel">
        <form method="get" action="<?php echo BASE_URL;?> pmcontrols/searchVehicle" style="display:flex; flex-direction:row;">
        <?php    

        if (isset($_GET['search'])){
            echo '<input class="searchbox" type="text" id="search" name="search" placeholder="RegNO, Type or MinCapacity" value="' . $_GET['search'] . '" >';
            echo '<button class="button view" onclick="viewall()" role="button">View All Vehicles</button>';
        }
        else{
            echo '<input class="searchbox" type="text" id="search" name="search" placeholder="RegNO, Type or MinCapacity" >';
        }
        ?>
        <input class="button green" type="submit" value="Search">
        </form>
    
        
        <button class="button blue" onclick="addVehicle()" role="button">Add New Vehicle</button>
        
    </div>
    <div>
        <table style="margin:auto; margin-top: 10px;">
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
                <?php if ($vehicle->availability == 1): ?>
                    <tr>
                <?php else: ?>
                    <tr style="background-color: red;">
                <?php endif; ?>
                    <td><?php echo $vehicle->registrationnumber; ?></td>
                    <td><?php echo $vehicle->type; ?></td>
                    <td><?php echo $vehicle->modelname; ?></td>
                    <td><?php echo $vehicle->vehicleno; ?></td>
                    <td><?php echo $vehicle->chassinumber; ?></td>
                    <td><?php echo $vehicle->enginenumber; ?></td>
                    <td><?php echo $vehicle->capacity; ?></td>
                    <td><?php echo $vehicle->availability; ?></td>
                    <td><button class="button yellow" onclick="edit(<?php echo $vehicle->vehicleno; ?>)">Update</button></td>
                    <td><button class="button red" onclick="del(<?php echo $vehicle->vehicleno; ?>)">Delete</button></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

<script>
    function addVehicle() {
        window.location.href = BASE_URL + "pmcontrols/addVehicleView";
    }
    function viewall(){
        window.location.href = BASE_URL + "pmcontrols/loadVehiclesView";
    }
    function edit(){
        window.location.href = BASE_URL + "pmcontrols/editVehicle";
    }
    function del(vehicleid) {
            window.location.href = BASE_URL +  "pmControls/deleteVehicle/"+vehicleid;
    }

</script>

</body>
</html>
