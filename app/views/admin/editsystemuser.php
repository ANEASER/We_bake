<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/form.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.min.css" rel="stylesheet">

    <title>Edit System user</title>
</head>
<body >
    <?php
        include "adminnav.php";
    ?>
    <?php
        if(isset($error)){
            echo '<script>
            
            const SwalwithButton = Swal.mixin({
                customClass: {
                    confirmButton: "greenbutton",
                },
                buttonsStyling: false
            });
            
            SwalwithButton.fire({
                icon: "error",
                title: "Oops...",
                text: "'.$error.'",
                confirmButtonText: "OK",
            })</script>';
        }
    ?>
    <section>
            <div class="form-container">

            <form class="form" method="POST" action="<?php echo BASE_URL; ?>AdminControls/editsystemuser">

            <input type="hidden" name="id" value="<?php echo $data[0]->UserID; ?>">

            <div class="form-group">
                <label for="Name">Name:</label>
                <input type="text" id="Name" name="Name" placeholder="<?php echo $data[0]->Name; ?>">
            </div>

            <div class="form-group">
                <label for="NIC">NIC:</label>
                <input type="text" id="NIC" name="NIC" placeholder="<?php echo $data[0]->NIC; ?>">
            </div>
            
            <div class="form-group">
                <label for="DOB">Date of Birth:</label>
                <input type="date" id="DOB" name="DOB" placeholder="<?php echo $data[0]->DOB; ?>">
            </div>
                    
            <div class="form-group">
                <label for="Email">Email:</label>
                <input type="email" id="Email" name="Email" placeholder="<?php echo $data[0]->Email; ?>">
            </div>
                    
            <div class="form-group">
                <label for="contactNo">Contact No:</label>
                <input type="text" id="contactNo" name="contactNo" placeholder="<?php echo $data[0]->contactNo; ?>">
            </div>
                    
            <div class="form-group">
                <label for="Address">Address:</label>
                <input type="text" id="Address" name="Address" placeholder="<?php echo $data[0]->Address; ?>">
            </div>
                    
            <div class="form-group">
                <label for="Role">Role:</label>
                <select id="Role" name="Role" >
                        <option value="billingclerk">Billing Clerk</option>
                        <option value="outletmanager">Outlet Manager</option>
                        <option value="productionmanager">Production Manager</option>
                        <option value="receptionist">Receptionist</option>
                        <option value="storemanager">Store Manager</option>
                </select>
            </div>
                    
            <div class="form-group">
                <label for="UserName">Username:</label>
                <input type="text" id="UserName" name="UserName" placeholder="<?php echo $data[0]->UserName; ?>">
            </div>
                    
            <label for="Password">Enter Password to Submit</label>
            <div class="form-group">
                
                <input type="text" id="Password1" name="Password" required>
            </div>
                    
            <input class="yellowbutton" type="submit" value="Update">

            </form>
            </div>
        </section>
</body>
</html>
