<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://localhost/we_bake/app/views/admin/adminstyle.css">
    <title>Edit System user</title>
    <style>
        input[type="text"],
        input[type="password"],
        input[type="email"],
        input[type="number"],
        input[type="date"],
        textarea,
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

    </style>
</head>
<body >

    <div class="container">
    <?php
        include "adminnav.php";
    ?>

        <div class="content">
    
            <form method="POST" action="http://localhost/we_bake/public/AdminControls/editsystemuser">

            <input type="hidden" name="id" value="<?php echo $data[0]->UserID; ?>">

            <div class="form-group">
                <label for="Name">Name:</label><br>
                <input type="text" id="Name" name="Name" placeholder="<?php echo $data[0]->Name; ?>"><br><br>
            </div>    
            
            <div class="form-group">
                <label for="NIC">NIC:</label><br>
                <input type="text" id="NIC" name="NIC" placeholder="<?php echo $data[0]->NIC; ?>"><br><br>
            </div>
            
            <div class="form-group">      
                <label for="DOB">Date of Birth:</label><br>
                <input type="date" id="DOB" name="DOB" placeholder="<?php echo $data[0]->DOB; ?>"><br><br>
            </div>

            <div class="form-group">
                <label for="Email">Email:</label><br>
                <input type="email" id="Email" name="Email" placeholder="<?php echo $data[0]->Email; ?>"><br><br>
            </div>

            <div class="form-group">
                <label for="contactNo">Contact No:</label><br>
                <input type="text" id="contactNo" name="contactNo" placeholder="<?php echo $data[0]->contactNo; ?>"><br><br>
            </div>

            <div class="form-group">
                <label for="Address">Address:</label><br>
                <input type="text" id="Address" name="Address" placeholder="<?php echo $data[0]->Address; ?>"><br><br>
            </div>
            
            <div class="form-group">      
                <label for="Role">Role:</label><br>
                <select id="Role" name="Role" >
                    <option value="billingclerk">Billing Clerk</option>
                    <option value="outletmanager">Outlet Manager</option>
                    <option value="productionmanager">Production Manager</option>
                    <option value="receptionist">Receptionist</option>
                    <option value="storemanager">Store Manager</option>
                </select><br><br>
            </div>
            
            <div class="form-group">
                <label for="UserName">Username:</label><br>
                <input type="text" id="UserName" name="UserName" placeholder="<?php echo $data[0]->UserName; ?>"><br><br>
            </div>

            <div class="form-group">    
                <label for="Password">Password:</label><br>
                <input type="text" id="Password1" name="Password" placeholder="<?php echo $data[0]->Password; ?>"><br><br>
            </div>    
            
            <div class="form-group">
                <input class="formbutton" type="submit" value="Submit">
            </div>

            </form>
        </div>
    </div>
    <script>
        function back() {
            window.location.href = ".http://localhost/we_bake/public/AdminControls";   
        }
    </script>
</body>
</html>
