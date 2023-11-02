<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://localhost/we_bake/app/views/admin/adminstyle.css">
    <title>Edit System user</title>
</head>
<body >

    <div class="container">
    <?php
        include "adminnav.php"
    ?>

        <div class="content">
    
            <form method="POST" action="http://localhost/we_bake/public/AdminControls/editsystemuser">

            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="form-group">
                <label for="Name">Name:</label><br>
                <input type="text" id="Name" name="Name" ><br><br>
            </div>    
            
            <div class="form-group">
                <label for="NIC">NIC:</label><br>
                <input type="text" id="NIC" name="NIC"><br><br>
            </div>
            
            <div class="form-group">      
                <label for="DOB">Date of Birth:</label><br>
                <input type="date" id="DOB" name="DOB" ><br><br>
            </div>

            <div class="form-group">
                <label for="Email">Email:</label><br>
                <input type="email" id="Email" name="Email" ><br><br>
            </div>

            <div class="form-group">
                <label for="contactNo">Contact No:</label><br>
                <input type="text" id="contactNo" name="contactNo"><br><br>
            </div>

            <div class="form-group">
                <label for="Address">Address:</label><br>
                <input type="text" id="Address" name="Address" ><br><br>
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
                <input type="text" id="UserName" name="UserName" ><br><br>
            </div>

            <div class="form-group">    
                <label for="Password">Password:</label><br>
                <input type="password" id="Password1" name="Password1" ><br><br>
            </div>    
                
            <div class="form-group">
                <label for="Password">Password:</label><br>
                <input type="password" id="Password2" name="Password2" ><br><br>
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
