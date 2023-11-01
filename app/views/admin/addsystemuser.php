<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://localhost/we_bake/app/views/admin/adminstyle.css">
    <title>Add System user</title>
</head>
<body>
    
    <div class="container">
        <div class="sub-container navbar">
            <h1 class="header">Add System User</h1>
            <button class="navbutton" onclick="back()">Back</button>
        </div>

        <div class="content">

            <form method="POST" style="padding: 3%;">

                <div class="form-group">
                <label for="Name">Name:</label><br>
                <input type="text" id="Name" name="Name" required><br><br>
                </div>

                <div class="form-group">
                <label for="NIC">NIC:</label><br>
                <input type="text" id="NIC" name="NIC" required><br><br>
                </div>

                <div class="form-group">
                <label for="DOB">Date of Birth:</label><br>
                <input type="date" id="DOB" name="DOB" required><br><br>
                </div>

                <div class="form-group">
                <label for="Email">Email:</label><br>
                <input type="email" id="Email" name="Email" required><br><br>
                </div>

                <div class="form-group">
                <label for="contactNo">Contact No:</label><br>
                <input type="text" id="contactNo" name="contactNo" required><br><br>
                </div>

                <div class="form-group">
                <label for="Address">Address:</label><br>
                <input type="text" id="Address" name="Address" required><br><br>
                </div>

                <div class="form-group">
                <label for="Role">Role:</label><br>
                <select id="Role" name="Role" required>
                    <option value="billingclerk">Billing Clerk</option>
                    <option value="outletmanager">Outlet Manager</option>
                    <option value="productionmanager">Production Manager</option>
                    <option value="receptionist">Receptionist</option>
                    <option value="storemanager">Store Manager</option>
                </select><br><br>
                </div>

                <div class="form-group">
                <label for="UserName">Username:</label><br>
                <input type="text" id="UserName" name="UserName" required><br><br>
                </div>

                <div class="form-group">
                <label for="Password">Password:</label><br>
                <input type="password" id="Password1" name="Password1" required><br><br>
                </div>

                <div class="form-group">
                <label for="Password">Password:</label><br>
                <input type="password" id="Password2" name="Password2" required><br><br>
                </div>

                <div class="button-container"> 
                    <input class="button" type="submit" value="Submit">
                </div>
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
