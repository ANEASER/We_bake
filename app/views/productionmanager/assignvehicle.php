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
    <title>Assign Vehicle</title>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.min.css" rel="stylesheet">

</head>
<body>
    

    <section style="display:flex;justify-content:space-around; padding-top:3%; width:100%">
        <?php
            if ($vehicles == null) {
                echo '<script>
                        Swal.fire({
                            title: "No vehicles available",
                            icon: "error",
                            confirmButtonColor: "#3085d6",
                            confirmButtonText: "OK"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Redirect to BASE_URL + "PmControls/index"
                                window.location.href = "' . BASE_URL . 'PmControls/index";
                            }
                        });
                    </script>';
            }
            else {
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
                echo '<td> <button class="greenbutton" onclick="Assign(\'' . $vehicle->vehicleno . '\', \'' . $orderid . '\')">Assign</button> </td>';
                
                echo '</tr>';
            }

            echo '</table>'; 
        } ?>
    </section>
    <script>
        var BASE_URL = "<?php echo BASE_URL; ?>";

        function Assign(vehicleno, orderid){
            window.location.href = BASE_URL + "PmControls/assignvehicle/" + vehicleno + "/" + orderid;
        }
    </script>
</body>
</html>