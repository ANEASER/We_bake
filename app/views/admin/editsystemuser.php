<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://localhost/we_bake/public/css/main.css">
    <title>Edit System user</title>
</head>
<body >
    <h1 class="header">Edit System User</h1>
    <div class="container">
        <div class="sub-container navbar">
            <button class="navbutton" onclick="back()">Back</button>
        </div>

        <div class="sub-container content">
            <form class="form-group" method="POST" style="padding: 3%;">
                <label for="Name">Name:</label><br>
                <input type="text" id="Name" name="Name" required><br><br>

                <label for="NIC">NIC:</label><br>
                <input type="text" id="NIC" name="NIC" required><br><br>

                <label for="DOB">Date of Birth:</label><br>
                <input type="date" id="DOB" name="DOB" required><br><br>

                <label for="Email">Email:</label><br>
                <input type="email" id="Email" name="Email" required><br><br>

                <label for="contactNo">Contact No:</label><br>
                <input type="text" id="contactNo" name="contactNo" required><br><br>

                <label for="Address">Address:</label><br>
                <input type="text" id="Address" name="Address" required><br><br>

                <label for="Role">Role:</label><br>
                <select id="Role" name="Role" required>
                    <option value="billingclerk">Billing Clerk</option>
                    <option value="outletmanager">Outlet Manager</option>
                    <option value="productionmanager">Production Manager</option>
                    <option value="receptionist">Receptionist</option>
                    <option value="storemanager">Store Manager</option>
                </select><br><br>

                <label for="UserName">Username:</label><br>
                <input type="text" id="UserName" name="UserName" required><br><br>

                <label for="Password">Password:</label><br>
                <input type="password" id="Password1" name="Password1" required><br><br>
                
                <label for="Password">Password:</label><br>
                <input type="password" id="Password2" name="Password2" required><br><br>


                <input class="button" type="submit" value="Submit">
            </form>
        </div>
    </div>
    <script>
        function back() {
            window.location.href = "../AdminControls";   
        }
    </script>
</body>
</html>
