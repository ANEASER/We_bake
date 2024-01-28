<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/tables.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/cart.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">

    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.min.css" rel="stylesheet">
<body>
   
    <?php
        include "adminnav.php"
    ?>

  
        <button onclick="add()">Add New Outlets</button>
        <?php
                $searchQuery = isset($_GET['search']) ? $_GET['search'] : '';
        ?>
        <section style="display:flex;justify-content:space-around; width:100%">
        <?php

                if(count($outlets) > 0) {     
                    echo '<table>';
                    echo '<tr>
                            <th class="hideonmobile" >DOS</th>
                            <th>contact No</th>
                            <th>Active State</th>
                            <th class="hideonmobile">Address</th>
                            <th class="hideonmobile">Email</th>
                            <th class="hideonmobile">Manager</th>
                            <th class="hideonmobile">District</th>
                            <th class="hideonmobile">OutletCode</th>
                            <th >Edit</th>
                        </tr>';

                        foreach($outlets as $outlet) {
                            if ($outlet->ActiveState == 1){
                            echo '<tr>';
                            echo '<td class="hideonmobile">' . $outlet->DOS . '</td>';
                            echo '<td>' . $outlet->contactNo . '</td>';
                            echo '<td>' . $outlet->ActiveState . '</td>';
                            echo '<td class="hideonmobile">' . $outlet->Address . '</td>';
                            echo '<td class="hideonmobile">' . $outlet->Email . '</td>';
                            echo '<td class="hideonmobile">' . $outlet->Manager . '</td>';
                            echo '<td class="hideonmobile">' . $outlet->District . '</td>';
                            echo '<td class="hideonmobile">' . $outlet->OutletCode . '</td>';
                            echo '<td><button class="yellowbutton" onclick="edit(' . $outlet->OutletId . ')">Edit</button></td>';
                            echo '</tr>';
                        } else {
                            echo '<tr style="background-color:red">';
                            echo '<td class="hideonmobile">' . $outlet->DOS . '</td>';
                            echo '<td>' . $outlet->contactNo . '</td>';
                            echo '<td>' . $outlet->ActiveState . '</td>';
                            echo '<td class="hideonmobile">' . $outlet->Address . '</td>';
                            echo '<td class="hideonmobile">' . $outlet->Email . '</td>';
                            echo '<td class="hideonmobile">' . $outlet->Manager . '</td>';
                            echo '<td class="hideonmobile">' . $outlet->District . '</td>';
                            echo '<td class="hideonmobile">' . $outlet->OutletCode . '</td>';
                            echo '<td><button class="redbutton" onclick="edit(' . $outlet->OutletId . ')">Edit</button></td>';
                            echo '</tr>';
                        }
                    }
                       
                } else {
                        echo '<h3>No outlets found</h3>';
                    }
            ?>
        </section>
    
    <script>

        var BASE_URL = "<?php echo BASE_URL; ?>";
        
        function add() {
            window.location.href = BASE_URL + "AdminControls/AddOutletview";
        }

        function edit(id) {
            window.location.href = BASE_URL + "AdminControls/EditOutletView/"+id;
        }

        function del(id) {
            const SwalwithButton = Swal.mixin({
                    customClass: {
                        confirmButton: "redbutton",
                        cancelButton: "yellowbutton"
                    },
                    buttonsStyling: false
                });

                SwalwithButton.fire({
                    title: "Are you sure you want to delete this outlet?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Delete",
                    cancelButtonText: "Cancel",
                    reverseButtons: true,
                    preConfirm: async () => {
                        try {
                            await SwalwithButton.fire({
                                title: "Deleted!",
                                text: "Outlet has been deleted.",
                                icon: "success",
                                confirmButtonText: "OK",
                                confirmButtonClass: "greenbutton"
                            });
                            window.location.href = BASE_URL + "AdminControls/deleteoutlet/"+id;
                        } catch (error) {
                            SwalwithButton.showValidationMessage(`Request failed: ${error}`);
                        }
                    },
                });
        }
    </script>

</body>
</html>
           