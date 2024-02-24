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
                    <label for="District">Suburbs</label>
                    <select id="District" name="District" placeholder="<?php echo $data[0]->District; ?>">
                        <option value="Dehiwala" <?php echo ($data[0]->District == "Dehiwala") ? "selected" : ""; ?>>Dehiwala-Mount Lavinia</option>
                        <option value="Nugegoda" <?php echo ($data[0]->District == "Nugegoda") ? "selected" : ""; ?>>Nugegoda</option>
                        <option value="Rajagiriya" <?php echo ($data[0]->District == "Rajagiriya") ? "selected" : ""; ?>>Rajagiriya</option>
                        <option value="Battaramulla" <?php echo ($data[0]->District == "Battaramulla") ? "selected" : ""; ?>>Battaramulla</option>
                        <option value="Kotte" <?php echo ($data[0]->District == "Kotte") ? "selected" : ""; ?>>Kotte</option>
                        <option value="Malabe" <?php echo ($data[0]->District == "Malabe") ? "selected" : ""; ?>>Malabe</option>
                        <option value="Kohuwala" <?php echo ($data[0]->District == "Kohuwala") ? "selected" : ""; ?>>Kohuwala</option>
                        <option value="Nawala" <?php echo ($data[0]->District == "Nawala") ? "selected" : ""; ?>>Nawala</option>
                        <option value="Pamankada" <?php echo ($data[0]->District == "Pamankada") ? "selected" : ""; ?>>Pamankada</option>
                        <option value="Wellawatte" <?php echo ($data[0]->District == "Wellawatte") ? "selected" : ""; ?>>Wellawatte</option>
                        <option value="Bambalapitiya" <?php echo ($data[0]->District == "Bambalapitiya") ? "selected" : ""; ?>>Bambalapitiya</option>
                        <option value="Kirulapone" <?php echo ($data[0]->District == "Kirulapone") ? "selected" : ""; ?>>Kirulapone</option>
                        <option value="Kolonnawa" <?php echo ($data[0]->District == "Kolonnawa") ? "selected" : ""; ?>>Kolonnawa</option>
                        <option value="Ethul Kotte" <?php echo ($data[0]->District == "Ethul Kotte") ? "selected" : ""; ?>>Ethul Kotte</option>
                        <option value="Maharagama" <?php echo ($data[0]->District == "Maharagama") ? "selected" : ""; ?>>Maharagama</option>
                    </select><br>
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
