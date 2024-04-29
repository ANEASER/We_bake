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

    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.min.css" rel="stylesheet">
<body>
<style>

input[type="text"] {
    width: 75%;
    padding: 8px;
    margin-bottom: 10px;
}

input[type="submit"] {
    width: 23%;
    padding: 8px;
    margin-bottom: 10px;
}
</style>
   
<?php
        include "adminnav.php";

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

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
        elseif (isset($_SESSION['message'])){
            $message = $_SESSION['message'];
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
          unset($_SESSION['message']);
    ?>

    <section style="width: 100%; padding:1%">
    <div style="display: flex; flex-direction:row; justify-content:space-between; margin-bottom:2%">
        <form method="GET" action="<?php echo BASE_URL; ?>AdminControls/searchOutlet" class="search" style="display: flex; flex-direction:row;">
                    <?php
                        if (isset($_GET['search'])) {
                            echo '<input type="text" id="search" name="search" placeholder="Manager, District or OutletCode" value="' . $_GET['search'] . '" class="searchbox">';
                            echo '<input type="submit" style="margin-right:1%" value="Search" class="searchbutton">';
                            echo '<button class="searchbutton" onclick="clearSearch(); return false;">Clear Search</button>';
                        } else {
                            echo '<input type="text" id="search" name="search" placeholder="Manager, District or OutletCode" class="searchbox">';
                            echo '<input type="submit" value="Search" class="searchbutton">';
                        }
                    ?>
        </form>
        <section class="buttongroup">
            <button style="width: 200px;" class="bluebutton" onclick="add()">Add New Outlets</button>
        </section>
    </div>
        
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
                            <th class="hideonmobile">City</th>
                            <th class="hideonmobile">OutletCode</th>
                            <th >Edit</th>
                        </tr>';

                        foreach($outlets as $outlet) {
                            if ($outlet->ActiveState == 1){
                            echo '<tr>';
                            echo '<td class="hideonmobile">' . $outlet->DOS . '</td>';
                            echo '<td>' . $outlet->contactNo . '</td>';

                            if($outlet->ActiveState == 1){
                               $active = "Active";}
                            else{
                                $active = "Inactive";}
                            echo '<td>' . $active . '</td>';
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
    </section>
    
    <script>

        var BASE_URL = "<?php echo BASE_URL; ?>";
        
        function add() {
            window.location.href = BASE_URL + "AdminControls/AddOutletview";
        }

        function edit(id) {
            window.location.href = BASE_URL + "AdminControls/EditOutletView/"+id;
        }

        function clearSearch() {
            window.location.href = BASE_URL + "AdminControls/loadOutletsView";
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
           