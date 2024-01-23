<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/form.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <title>Add Outlet</title>
</head>
<body>
    
    <div>
    <?php
        include "adminnav.php"
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
            <form class="form" method="POST" action="<?php echo BASE_URL; ?>AdminControls/EditOutlet">
                
                <input type="hidden" name="id" value="<?php echo $data[0]->OutletID; ?>">

                <div class="form-group">
                    <label for="DOS">Date of Establishment:</label>
                    <input type="date" id="DOS" name="DOS" placeholder="<?php echo $data[0]->DOS; ?>">
                    
                <div class="form-group">
                    <label for="contactNo">Contact No:</label>
                    <input type="text" id="contactNo" name="contactNo" placeholder="<?php echo $data[0]->contactNo; ?>">
                </div>
                    
                <div class="form-group">
                    <label for="ActiveState">Active State:</label>
                    <select id="ActiveState" name="ActiveState" placeholder="<?php echo $data[0]->ActiveState; ?>">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                    
                <div class="form-group">
                    <label for="Address">Address:</label>
                    <input type="text" id="Address" name="Address" placeholder="<?php echo $data[0]->Address; ?>">
                </div>

                <div class="form-group">
                    <label for="District">District</label>
                    <select id="District" name="District" placeholder="<?php echo $data[0]->District; ?>">
                        <option value="Ampara">Ampara</option>
                        <option value="Anuradhapura">Anuradhapura</option>
                        <option value="Badulla">Badulla</option>
                        <option value="Batticaloa">Batticaloa</option>
                        <option value="Colombo">Colombo</option>
                        <option value="Galle">Galle</option>
                        <option value="Gampaha">Gampaha</option>
                        <option value="Hambantota">Hambantota</option>
                        <option value="Jaffna">Jaffna</option>
                        <option value="Kalutara">Kalutara</option>
                        <option value="Kandy">Kandy</option>
                        <option value="Kegalle">Kegalle</option>
                        <option value="Kilinochchi">Kilinochchi</option>
                        <option value="Kurunegala">Kurunegala</option>
                        <option value="Mannar">Mannar</option>
                        <option value="Matale">Matale</option>
                        <option value="Matara">Matara</option>
                        <option value="Monaragala">Monaragala</option>
                        <option value="Mullaitivu">Mullaitivu</option>
                        <option value="Nuwara Eliya">Nuwara Eliya</option>
                        <option value="Polonnaruwa">Polonnaruwa</option>
                        <option value="Puttalam">Puttalam</option>
                        <option value="Ratnapura">Ratnapura</option>
                        <option value="Trincomalee">Trincomalee</option>
                        <option value="Vavuniya">Vavuniya</option>
                    </select><br><br>
                </div>
                    
                <div class="form-group">
                    <label for="Email">Email:</label>
                    <input type="text" id="Email" name="Email" placeholder="<?php echo $data[0]->Email; ?>">
                </div>
                    
                <div class="form-group">
                    <label for="Manager">Manager:</label>
                    <?php
                        echo "
                            <select id='Manager' name='Manager' >
                                <option value=''>Select Manager</option>";

                        foreach ($managers as $manager) {
                            echo "<option value='$manager->EmployeeNo'>$manager->EmployeeNo</option>";
                        }

                        echo "</select>";
                    ?>
                </div>

                <label for="Password">Enter Password to Submit</label>

                <div class="form-group">
                    <input type="text" id="Password1" name="Password" required>
                </div>
                    

                
                    
                    <input class="yellowbutton" type="submit" value="Submit">
        
                </form>
                </div>
        </section>
    </div>
    
</body>
</html>
