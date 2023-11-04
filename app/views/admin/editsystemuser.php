<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit System user</title>
</head>
<body >
    <?php
        include "adminnav.php";
    ?>
    
            <form method="POST" action="http://localhost/we_bake/public/AdminControls/editsystemuser">

            <input type="hidden" name="id" value="<?php echo $data[0]->UserID; ?>">

           
            <label for="Name">Name:</label><br>
            <input type="text" id="Name" name="Name" placeholder="<?php echo $data[0]->Name; ?>"><br><br>
            
            <label for="NIC">NIC:</label><br>
            <input type="text" id="NIC" name="NIC" placeholder="<?php echo $data[0]->NIC; ?>"><br><br>
           
            <label for="DOB">Date of Birth:</label><br>
            <input type="date" id="DOB" name="DOB" placeholder="<?php echo $data[0]->DOB; ?>"><br><br>

            <label for="Email">Email:</label><br>
            <input type="email" id="Email" name="Email" placeholder="<?php echo $data[0]->Email; ?>"><br><br>
          
            <label for="contactNo">Contact No:</label><br>
            <input type="text" id="contactNo" name="contactNo" placeholder="<?php echo $data[0]->contactNo; ?>"><br><br>

            <label for="Address">Address:</label><br>
            <input type="text" id="Address" name="Address" placeholder="<?php echo $data[0]->Address; ?>"><br><br>
     
            <label for="Role">Role:</label><br>
            <select id="Role" name="Role" >
                    <option value="billingclerk">Billing Clerk</option>
                    <option value="outletmanager">Outlet Manager</option>
                    <option value="productionmanager">Production Manager</option>
                    <option value="receptionist">Receptionist</option>
                    <option value="storemanager">Store Manager</option>
            </select><br><br>
   
            <label for="UserName">Username:</label><br>
            <input type="text" id="UserName" name="UserName" placeholder="<?php echo $data[0]->UserName; ?>"><br><br>

            <label for="Password">Password:</label><br>
            <input type="text" id="Password1" name="Password" placeholder="<?php echo $data[0]->Password; ?>"><br><br>
  
            <input class="formbutton" type="submit" value="Submit">

            </form>

</body>
</html>
