<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://localhost/we_bake/app/views/admin/adminstyle.css">
    
    <style>
            input[type="text"],
            input[type="password"],
            input[type="email"],
            input[type="number"],
            input[type="date"],
            select
            {
                width: 60%;
                padding: 10px;
                margin-bottom: 10px;
                margin-right: 10px;
                border: 1px solid #D9D9D9;
                border-radius: 5px;
                background: #D9D9D9;
                align-items: center;
                align-self: center;
            }

            .formbutton {
                background-color: #bc9b72;
                color: white;
                padding: 10px 30px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                align-self: center;
            }


            button:hover {
                background-color: #9b7b54;
            }

            .form-group {
                display: flex;
                align-items: center;
                margin-bottom: 10px;
                margin-left: 2px;
            }


    </style>
    
    <title>Add System user</title>
</head>
<body>
    
    <div class="container">
    <?php
        include "adminnav.php"
    ?>

        <div class="content">

            <form method="POST" style="padding: 3%;" action="http://localhost/we_bake/public/AdminControls/addsystemuser">

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

                <div class="button-container"> 
                    <input class="formbutton" type="submit" value="Submit">
                </div>
            </form>
        </div>
    </div>
    <script>
        function back() {
            window.location.href = "http://localhost/we_bake/public/AdminControls";
        }
    </script>
</body>
</html>
