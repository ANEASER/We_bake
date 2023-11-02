<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://localhost/we_bake/app/views/admin/adminstyle.css">
    <title>Outlet</title>
</head>
<body style="font-weight: 800">
   
    <div class="container">
        <div class="sub-container navbar">
            <h1 class="dashboard">Outlets</h1>
            <button class="navbutton" onclick="back()">Back</button>
        </div>

        <div class="content">

            <div class="suppdash">
                <button class="formbutton" onclick="add()">Add New Outlets</button>
            </div>

            <div>
                <table style="border-collapse: collapse; width: 100%;">
                    <tr>
                        <th>Date of Establishment</th>
                        <th>Contact Number</th>
                        <th>Active State</th>
                        <th>Address</th>
                        <th>Outlet ID</th>
                        <th>Email</th>
                        <th>Manager</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                    <tr>
                        <td>2023-10-01</td>
                        <td>1234567890</td>
                        <td>1</td>
                        <td>123 Main St, City</td>
                        <td>Outlet1</td>
                        <td>example@email.com</td>
                        <td>John Doe</td>
                        <td><button class="formbutton" onclick="edit()">Update</button></td>
                        <td><button class="formbutton" onclick="window.location.href='deletesupplier.php'">Delete</button></td>
                    </tr>
                    <tr>
                        <td>2023-10-01</td>
                        <td>9876543210</td>
                        <td>1</td>
                        <td>456 Elm St, Town</td>
                        <td>Outlet2</td>
                        <td>another@email.com</td>
                        <td>Jane Smith</td>
                        <td><button class="formbutton" onclick="edit()">Update</button></td>
                        <td><button class="formbutton" onclick="window.location.href='deletesupplier.php'">Delete</button></td>
                    </tr>
                    <!-- Add more rows with dummy data as needed -->
                </table>

            </div>

        </div>
    </div>

    <script>
        function back() {
            window.location.href = "http://localhost/we_bake/public/AdminControls";
        }

        function add() {
            window.location.href = "http://localhost/we_bake/public/AdminControls/addOutlet";
        }

        function edit() {
            window.location.href = "http://localhost/we_bake/public/AdminControls/EditOutlet";
        }
    </script>

</body>
</html>
           