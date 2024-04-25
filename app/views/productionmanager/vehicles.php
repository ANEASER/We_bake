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
            border-radius: 9px;
        }
        .red{
            background-color: #e74c3c;
        }
        .green{
            background-color: #2ecc71;
        }
        .blue{
            margin-left:2%;
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


    <div class="searchpanel">
        <form method="get" action="<?php echo BASE_URL;?>pmcontrols/searchVehicle" style="display:flex; flex-direction:row;">
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
    
    </div>
    <button class="button blue" onclick="addVehicle()" role="button">Add New Vehicle</button>
       


    <?php
        $searchQuery = isset($_GET['search']) ? $_GET['search'] : '';
    ?>
    <section style="display:flex;justify-content:space-around; width:100%">
    <?php
        echo '<table style="margin:auto; margin-top: 10px;">';
            echo '<tr>
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
            </tr>';
            foreach ($vehicles as $vehicle){ 
                if ($vehicle->ActiveState == 1){
                    if ($vehicle->availability == 1){ 
                    echo '<tr>';
                    echo '<td>'.$vehicle->registrationnumber.'</td>';
                    echo '<td>'.$vehicle->type.'</td>';
                    echo '<td>'.$vehicle->modelname.'</td>';
                    echo '<td>'.$vehicle->vehicleno.'</td>';
                    echo '<td>'.$vehicle->chassinumber.'</td>';
                    echo '<td>'.$vehicle->enginenumber.'</td>';
                    echo '<td>'.$vehicle->capacity.'</td>';
                    echo '<td>'.$vehicle->availability.'</td>';
                    echo '<td><button class="button yellow" onclick="edit(\''.$vehicle->vehicleno.'\')">Update</button></td>';
echo '<td><button class="button red" onclick="del(\''.$vehicle->vehicleno.'\')">Delete</button></td>';
echo '</tr>';
                }
                else{ 
                    echo '<tr style="background-color: red;">';
                    echo '<td>'.$vehicle->registrationnumber.'</td>';
                    echo '<td>'.$vehicle->type.'</td>';
                    echo '<td>'.$vehicle->modelname.'</td>';
                    echo '<td>'.$vehicle->vehicleno.'</td>';
                    echo '<td>'.$vehicle->chassinumber.'</td>';
                    echo '<td>'.$vehicle->enginenumber.'</td>';
                    echo '<td>'.$vehicle->capacity.'</td>';
                    echo '<td>'.$vehicle->availability.'</td>';
                    echo '<td><button class="button yellow" onclick="edit('.$vehicle->vehicleno.')">Update</button></td>';
                    echo '<td><button class="button red" onclick="del('.$vehicle->vehicleno.')">Delete</button></td>';
                echo '</tr>';
                }
                    
                }
            }
        echo '</table>';
    ?>
    </section>

<script>
    var BASE_URL = "<?php echo BASE_URL; ?>";

    function addVehicle() {
        window.location.href = BASE_URL + "pmcontrols/addVehicleView";
    }
    function viewall(){
        window.location.href = BASE_URL + "pmcontrols/loadVehiclesView";
    }
    function edit(vehicleid){
        window.location.href = BASE_URL + "pmcontrols/editVehicleView/"+ vehicleid;
    }
    function del(vehicleid) {
            window.location.href = BASE_URL +  "pmControls/deleteVehicle/"+ vehicleid;
    }

</script>

</body>
</html>
