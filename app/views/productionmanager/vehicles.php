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
            margin-left: 10px;
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
        <form method="GET" action="<?php echo BASE_URL;?>pmcontrols/searchVehicle" class="search" style="display:flex; flex-direction:row;">
        <?php
        if(isset($_GET['search'])){
            echo '<input type="text" id="search" name="search" placeholder="RegNO, Type or MinCapacity" value="'.$_GET['search'].'" class="searchbox">';
            echo '<input type="submit" value="Search" class="button green">';
            echo '<button class="button green" onclick="clearSearch(); return false;">Clear Search</button>';
        }
        else{
            echo '<input type="text" id="search" name="search" placeholder="RegNO, Type or MinCapacity" value="" class="searchbox">';
            echo '<input type="submit" value="Search" class="button green">';
        }
        ?>
        </form>
        </div>
    <button class="button blue" onclick="addVehicle()" role="button">Add New Vehicle</button>

    <?php
        $searchQuery = isset($_GET['search']) ? $_GET['search'] : '';
    ?>
    <section style="display:flex;justify-content:space-around; width:100%">
    <?php
  
    if($vehicles != null){
        echo '<table style="margin:auto; margin-top: 10px;">';
            echo '<tr>
                <th>Registration Number</th>
                <th>Vehicle Type</th>
                <th>Model Name</th>
                <th>Vehicle Number</th>
                <th>Chassi Number</th>
                <th>Engine Number</th>
                <th>Capacity(No.of Containers)</th>
                <th>Availability</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>';
            foreach($vehicles as $vehicle){ 
                
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
    }
    else{
        echo '<h1 style="margin-left:25%;">No vehicles to show</h1>"';
    }
    ?>
    </section>

<script>
    var BASE_URL = "<?php echo BASE_URL; ?>";

    function clearSearch(){
        window.location.href = BASE_URL + "pmcontrols/loadVehiclesView";
    }

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
        const SwalwithButton = Swal.mixin({
            customClass: {
                confirmButton: "button yellow",
                cancelButton: "button yellow"
            },
            buttonsStyling: false
            });

            SwalwithButton.fire({
                text: "Are you sure you want to delete this vehicle?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes",
                cancelButtonText: "No",
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Vehicle Deleted Successfully',
                        text: 'The vehicle has been successfully deleted.',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        window.location.href = BASE_URL +  "pmControls/deleteVehicle/"+ vehicleid;
    });
                }
            });
            }

</script>

</body>
</html>
