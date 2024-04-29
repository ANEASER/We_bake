<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/tables.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/cart.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <title>System User</title>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.min.css" rel="stylesheet">

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
</head>
    <body>
    <?php
        include "adminnav.php";

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION["error"])){
            $error = $_SESSION["error"];
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
          </script>";
          unset($_SESSION['error']);
        
        }

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
        <form method="GET" action="<?php echo BASE_URL; ?>AdminControls/searchUsers" style="display: flex; flex-direction:row;">
            <?php
                if(isset($_GET['search'])) {
                    echo '<input type="text" id="search" name="search" placeholder="username or NIC" value="' . $_GET['search'] . '" class="searchbox">';
                    echo '<input class="searchbutton" style="margin-right:1%" type="submit" value="Search">';
                    echo '<button class="searchbutton" onclick="clearSearch(); return false;">Clear Search</button>';
                } else {
                    echo '<input type="text" id="search" name="search" placeholder="username, role or NIC" class="searchbox">';
                    echo '<input class="searchbutton" type="submit" value="Search">';
                }?>
        </form>
        <section class="buttongroup">
            <button style="width: 200px;"  class="bluebutton" onclick="add()">Add New User</button>
        </section>
    </div>

   
            <?php
                $searchQuery = isset($_GET['search']) ? $_GET['search'] : '';
            ?>
            <section style="display:flex;justify-content:space-around; width:100%">
            <?php
                if(count($users) > 0) {     
                echo '<table style="width:70%">';
                echo '<tr>
                        <th class="hideonmobile" >Name</th>
                        
                       
                        <th>Contact No</th>
                        <th>Active State</th>
                        
                        <th>EmployeeNo</th>
                        <th>Role</th>
                        <th>User Name</th>
                        <th >Email</th>
                        <th >Update</th>
                        <th>Delete</th>
                        <th>More</th>
                    </tr>';

                    foreach ($users as $user) {
                        if ($user->Role !== 'admin'&& $user->Role !== 'owner'  && (stripos($user->UserName, $searchQuery) !== false || (stripos($user->NIC, $searchQuery) !== false) || (stripos($user->Role, $searchQuery) !== false))) {
                            echo '<tr>';
                            echo '<td class="hideonmobile">' . $user->Name . '</td>';
                           
                            echo '<td class="hideonmobile">' . $user->contactNo . '</td>';

                            if($user->ActiveState == 'Active') {
                                $ActiveState = 'Active';
                            } else {
                                $ActiveState = 'Inactive';
                            }
                            echo '<td>' . $ActiveState . '</td>';
                            echo '<td>' . $user->EmployeeNo . '</td>';
                            echo '<td>' . $user->Role . '</td>';
                            echo '<td>' . $user->UserName . '</td>';
                            echo '<td >' . $user->Email . '</td>';
                            echo '<td ><button class="yellowbutton" onclick="edit(' . $user->UserID . ')">Update</button></td>';
                            echo '<td ><button class="redbutton" onclick="del(' . $user->UserID . ')">Revoke</button></td>';
                            echo '<td><button class="bluebutton" onclick="more(' . $user->UserID . ')">More</button></td>';
                            echo '</tr>';
                        }
                    }

                    echo '</table>';} else {
                        echo '<h3>No users found</h3>';
                    }
            ?>
        </section>
    <script>

        var BASE_URL = "<?php echo BASE_URL; ?>";

        function search() {
            var query = document.getElementById('search').value;
            window.location.href = BASE_URL + "AdminControls/searchUsers?search=" + encodeURIComponent(query);
        }

        function clearSearch() {
            window.location.href = BASE_URL + "AdminControls/loadUsersView";
        }
        
        function add() {
            window.location.href = BASE_URL + "AdminControls/addUser";
        }

        function edit(user) {
            window.location.href = BASE_URL + "AdminControls/EditUser/"+user;
        }

        function more(user) {
            window.location.href = BASE_URL + "AdminControls/ViewUser/"+user;
        }

        function del(user) {
                const SwalwithButton = Swal.mixin({
                    customClass: {
                        confirmButton: "redbutton",
                        cancelButton: "yellowbutton"
                    },
                    buttonsStyling: false
                });

                SwalwithButton.fire({
                    title: "Are you sure you want to Revoke this user",
                    text: "You can can revert this by resiting user's password!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Revoke",
                    cancelButtonText: "Cancel",
                    reverseButtons: true,
                    preConfirm: async () => {
                        try {
                            await SwalwithButton.fire({
                                title: "Revoked!",
                                text: "System user previlages revoked.",
                                icon: "success",
                                confirmButtonText: "OK",
                                confirmButtonClass: "greenbutton"
                            });
                            window.location.href = BASE_URL + "AdminControls/deletesystemuser/"+user;
                        } catch (error) {
                            SwalwithButton.showValidationMessage(`Request failed: ${error}`);
                        }
                    },
                });
            }

    </script>
</body>
</html>
           