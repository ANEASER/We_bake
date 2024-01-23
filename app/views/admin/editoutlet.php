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
                
                <input type="hidden" name="id" value="<?php echo $data[0]->OutletId; ?>">

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
                            <option value="active" <?php echo ($data[0]->ActiveState == 1) ? "selected" : ""; ?>>Active</option>
                            <option value="inactive" <?php echo ($data[0]->ActiveState == 0) ? "selected" : ""; ?>>Inactive</option>
                    </select>
                </div>
                    
                <div class="form-group">
                    <label for="Address">Address:</label>
                    <input type="text" id="Address" name="Address" placeholder="<?php echo $data[0]->Address; ?>">
                </div>

                <div class="form-group">
                    <label for="District">District</label>
                    <select id="District" name="District" placeholder="<?php echo $data[0]->District; ?>">
                        <option value="Ampara" <?php echo ($data[0]->District == "Ampara") ? "selected" : ""; ?>>Ampara</option>
                        <option value="Anuradhapura" <?php echo ($data[0]->District == "Anuradhapura") ? "selected" : ""; ?>>Anuradhapura</option>
                        <option value="Badulla" <?php echo ($data[0]->District == "Badulla") ? "selected" : ""; ?>>Badulla</option>
                        <option value="Batticaloa" <?php echo ($data[0]->District == "Batticaloa") ? "selected" : ""; ?>>Batticaloa</option>
                        <option value="Colombo" <?php echo ($data[0]->District == "Colombo") ? "selected" : ""; ?>>Colombo</option>
                        <option value="Galle" <?php echo ($data[0]->District == "Galle") ? "selected" : ""; ?>>Galle</option>
                        <option value="Gampaha" <?php echo ($data[0]->District == "Gampaha") ? "selected" : ""; ?>>Gampaha</option>
                        <option value="Hambantota" <?php echo ($data[0]->District == "Hambantota") ? "selected" : ""; ?>>Hambantota</option>
                        <option value="Jaffna" <?php echo ($data[0]->District == "Jaffna") ? "selected" : ""; ?>>Jaffna</option>
                        <option value="Kalutara" <?php echo ($data[0]->District == "Kalutara") ? "selected" : ""; ?>>Kalutara</option>
                        <option value="Kandy" <?php echo ($data[0]->District == "Kandy") ? "selected" : ""; ?>>Kandy</option>
                        <option value="Kegalle" <?php echo ($data[0]->District == "Kegalle") ? "selected" : ""; ?>>Kegalle</option>
                        <option value="Kilinochchi" <?php echo ($data[0]->District == "Kilinochchi") ? "selected" : ""; ?>>Kilinochchi</option>
                        <option value="Kurunegala" <?php echo ($data[0]->District == "Kurunegala") ? "selected" : ""; ?>>Kurunegala</option>
                        <option value="Mannar" <?php echo ($data[0]->District == "Mannar") ? "selected" : ""; ?>>Mannar</option>
                        <option value="Matale" <?php echo ($data[0]->District == "Matale") ? "selected" : ""; ?>>Matale</option>
                        <option value="Matara" <?php echo ($data[0]->District == "Matara") ? "selected" : ""; ?>>Matara</option>
                        <option value="Monaragala" <?php echo ($data[0]->District == "Monaragala") ? "selected" : ""; ?>>Monaragala</option>
                        <option value="Mullaitivu" <?php echo ($data[0]->District == "Mullaitivu") ? "selected" : ""; ?>>Mullaitivu</option>
                        <option value="Nuwara Eliya" <?php echo ($data[0]->District == "Nuwara Eliya") ? "selected" : ""; ?>>Nuwara Eliya</option>
                        <option value="Polonnaruwa" <?php echo ($data[0]->District == "Polonnaruwa") ? "selected" : ""; ?>>Polonnaruwa</option>
                        <option value="Puttalam" <?php echo ($data[0]->District == "Puttalam") ? "selected" : ""; ?>>Puttalam</option>
                        <option value="Ratnapura" <?php echo ($data[0]->District == "Ratnapura") ? "selected" : ""; ?>>Ratnapura</option>
                        <option value="Trincomalee" <?php echo ($data[0]->District == "Trincomalee") ? "selected" : ""; ?>>Trincomalee</option>
                        <option value="Vavuniya" <?php echo ($data[0]->District == "Vavuniya") ? "selected" : ""; ?>>Vavuniya</option>
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
