<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System User</title>
</head>
    <body>
    <?php
        include "adminnav.php"
    ?>


    <button onclick="add()">Add New User</button>

            
            <?php
                echo '<table style="margin-left:-5%">';
                echo '<tr>
                        <th>Name</th>
                        <th>NIC</th>
                        <th>DOB</th>
                        <th>Contact No</th>
                        <th>Active State</th>
                        <th>Address</th>
                        <th>User ID</th>
                        <th>Role</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>';

                    foreach ($users as $user) {
                        if ($user->Role !== 'admin') {
                            echo '<tr>';
                            echo '<td>' . $user->Name . '</td>';
                            echo '<td>' . $user->NIC . '</td>';
                            echo '<td>' . $user->DOB . '</td>';
                            echo '<td>' . $user->contactNo . '</td>';
                            echo '<td>' . $user->ActiveState . '</td>';
                            echo '<td>' . $user->Address . '</td>';
                            echo '<td>' . $user->UserID . '</td>';
                            echo '<td>' . $user->Role . '</td>';
                            echo '<td>' . $user->UserName . '</td>';
                            echo '<td>' . $user->Email . '</td>';
                            echo '<td><button onclick="edit(' . $user->UserID . ')">Update</button></td>';
                            echo '<td><button onclick="del(' . $user->UserID . ')">Delete</button></td>';
                            echo '</tr>';
                        }
                    }

                    echo '</table>';
            ?>

    <script>

        var BASE_URL = "<?php echo BASE_URL; ?>";
        
        function add() {
            window.location.href = BASE_URL + "AdminControls/addUser";
        }

        function edit(user) {
            window.location.href = BASE_URL + "AdminControls/EditUser/"+user;
        }

        function del(user) {
            window.location.href = BASE_URL + "AdminControls/deletesystemuser/"+user;
        }

    </script>
</body>
</html>
           