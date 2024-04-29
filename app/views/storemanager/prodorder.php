<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/tables.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


    <title>Store Manager_Production</title>
</head>
<body>
    <?php
        include "smnavbar.php";

        if (isset($error)){
            echo "<script>

            const SwalwithButton = Swal.mixin({
                customClass: {
                    confirmButton: 'greenbutton',
                },
                buttonsStyling: false
            });

            
            if (typeof Swal !== 'undefined') {
                SwalwithButton.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '$error',
                    confirmButtonText: 'OK',
                });
            } else {
                alert('$error');
            }
          </script>";}
        elseif (isset($message)){
            echo "<script>

            const SwalwithButton = Swal.mixin({
                customClass: {
                    confirmButton: 'greenbutton',
                },
                buttonsStyling: false
            });

            
            if (typeof Swal !== 'undefined') {
                SwalwithButton.fire({
                    icon: 'success',
                    title: 'Success',
                    text: '$message',
                    confirmButtonText: 'OK',
                });
            } else {
                alert('$message');
            }
          </script>";}
    ?>

    

    <div class="content">
        <h1>Production Order</h1>
        
    </div>

    <section style="display:flex;justify-content:space-around; width:100%">
    <?php //The table structure 
        if (count($stockorderline) > 0){
            echo '<table style="width:90%">';
            echo '<tr>
                    <th> Item Name </th>
                    <th> Quantity </th>
                    <th> Request Type</th>
                    <th> Accept</th>
                </tr>';

                foreach($stockorderline as $stockorderline){
                    echo '<tr>';
                    echo '<td>' . $stockorderline->RawName . '</td>';
                    echo '<td>' . $stockorderline->quantity . '</td>';
                    echo '<td>' . $stockorderline->req_type . '</td>';
                    echo '<td>';
                    if ($stockorderline->status == 'pending') {
                        echo '<button class="greenbutton" onclick="acceptOrder(' . $stockorderline->id . ')">Accept</button>';
                    } else {
                        echo '<button class="bluebutton">Accepted</button>';
                    }
                    echo '</td>'; 
                    echo '</tr>';

                }
            echo '</table>';

        }

        else{
            echo '<h3> No stocks available </h3>';
        }
        
    ?>
    </section>
    <script>

        var BASE_URL = "<?php echo BASE_URL; ?>";

        // function acceptOrder(id) {
        //     window.location.href = BASE_URL +  "StoreControls/acceptOrder/"+id;
        // }

        function acceptOrder(id) {
            // Display a confirmation dialog using SweetAlert
            Swal.fire({
            title: 'Are you sure?',
            text: 'Once accepted, this order will be marked as accepted!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, accept it!'
            }).then((result) => {
                // If user confirms, redirect to the acceptOrder URL with the supplied ID
                if (result.isConfirmed) {
                    window.location.href = BASE_URL + 'StoreControls/acceptOrder/' + id;
                }
            });
        }

    </script>
</body>
</html>
