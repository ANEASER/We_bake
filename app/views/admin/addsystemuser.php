<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/form.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <title>Add System user</title>
</head>
<body>
    
    <div>
    <?php
        include "adminnav.php"
    ?>
    <section>
            <div class="form-container">

                <form class="form" method="POST" action="<?php echo BASE_URL; ?>AdminControls/addsystemuser">

                    <div class="form-group">
                        <label for="Name">Name:</label>
                        <input type="text" id="Name" name="Name" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="NIC">NIC:</label>
                        <input type="text" id="NIC" name="NIC" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="DOB">Date of Birth:</label>
                        <input type="date" id="DOB" name="DOB" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="Email">Email:</label>
                        <input type="email" id="Email" name="Email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="contactNo">Contact No:</label>
                        <input type="text" id="contactNo" name="contactNo" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="Address">Address:</label>
                        <input type="text" id="Address" name="Address" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="Role">Role:</label>
                        <select id="Role" name="Role" required>
                            <option value="billingclerk">Billing Clerk</option>
                            <option value="outletmanager">Outlet Manager</option>
                            <option value="productionmanager">Production Manager</option>
                            <option value="receptionist">Receptionist</option>
                            <option value="storemanager">Store Manager</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="UserName">Username:</label>
                        <input type="text" id="UserName" name="UserName" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="Password">Password:</label>
                        <input type="password" id="Password1" name="Password1" required>
                    </div>
                    
                        <input type="submit" value="Submit">
                    
                </form>
            </div>
        </section>
    </div>
    
</body>
</html>
