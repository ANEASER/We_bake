<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://localhost/we_bake/app/views/admin/adminstyle.css">
    <title>Vehicle</title>
</head>
<body style="font-weight: 800">
    
    <div class="container">
        <div class="navbar">
            <h1>Vehicles</h1>
            <button class="navbutton" onclick="back()">Back</button>
        </div>

        <div class="content">
            <div class="suppdash">
                <button class="formbutton" onclick="add()">Add New Vehicle</button>
            </div>
            <div>
            <table style="border-collapse: collapse; width: 100%;">
                <tr>
                    <th>Registration Number</th>
                    <th>Type</th>
                    <th>Capacity</th>
                    <th>Availability</th>
                    <th>Vehicle Number</th>
                    <th>Chassis Number</th>
                    <th>Engine Number</th>
                    <th>Model Name</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                <tr>
                    <td>ABC1234567890</td>
                    <td>Truck</td>
                    <td>5000</td>
                    <td>1</td>
                    <td>001</td>
                    <td>CHASSIS123</td>
                    <td>ENGINE456</td>
                    <td>Truck Model X</td>
                    <td><button class="formbutton" onclick="edit()">Update</button></td>
                    <td><button class="formbutton" onclick="window.location.href='deletesupplier.php'">Delete</button></td>
                </tr>
                <tr>
                    <td>XYZ9876543210</td>
                    <td>Van</td>
                    <td>1500</td>
                    <td>1</td>
                    <td>002</td>
                    <td>CHASSIS789</td>
                    <td>ENGINE789</td>
                    <td>Van Model Y</td>
                    <td><button class="formbutton" onclick="edit()">Update</button></td>
                    <td><button class="formbutton" onclick="window.location.href='deletesupplier.php'">Delete</button></td>
                </tr>
            </table>
            </div>
        </div>
    </div>
    <script>
        function back() {
            window.location.href = "../pmControls";
        }

        function add() {
            window.location.href = "../pmControls/addVehicle";
        }

        function edit() {
            window.location.href = "../pmControls/editVehicle";
        }
    </script>
</body>
</html>
           