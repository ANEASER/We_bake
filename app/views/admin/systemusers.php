<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://localhost/we_bake/app/views/admin/adminstyle.css">
    <title>System User</title>
</head>
<body style="font-weight: 800">
    <div class="container">
        <div class="navbar">
            <h1>System Users</h1>
            <button class="navbutton" onclick="back()">Back</button>
        </div>

        <div class="content">
            <div class="suppdash">
                <button class="formbutton" onclick="add()">Add New User</button>
            </div>
            <div>
                <table style="border-collapse: collapse; width: 100%;">
                            <tr>
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
                            </tr>
                            <tr>
                                <td>John Doe</td>
                                <td>123456789V</td>
                                <td>1990-05-15</td>
                                <td>1234567890</td>
                                <td>1</td>
                                <td>123 Main St, City</td>
                                <td>1</td>
                                <td>Admin</td>
                                <td>johndoe</td>
                                <td>johndoe@example.com</td>
                                <td><button class="formbutton" onclick="edit()">Update</button></td>
                            </tr>
                            <tr>
                                <td>Jane Smith</td>
                                <td>987654321W</td>
                                <td>1985-08-20</td>
                                <td>9876543210</td>
                                <td>1</td>
                                <td>456 Elm St, Town</td>
                                <td>2</td>
                                <td>User</td>
                                <td>janesmith</td>
                                <td>janesmith@example.com</td>
                                <td><button class="formbutton" onclick="edit()">Update</button></td>
                            </tr>
                    </table>
            </div>   
        </div>
    </div>
    <script>
        function back() {
            window.location.href = "../AdminControls";
        }

        function add() {
            window.location.href = "../AdminControls/addUser";
        }

        function edit() {
            window.location.href = "../AdminControls/editUser";
        }
    </script>
</body>
</html>
           