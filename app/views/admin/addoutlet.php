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

    <section>
        <div class="form-container">
            <form class="form" method="POST" action="<?php echo BASE_URL; ?>AdminControls/AddOutlet">
                <div class="form-group">
                    <label for="DOS">Date of Establishment:</label>
                    <input type="date" id="DOS" name="DOS" required>
                    
                <div class="form-group">
                    <label for="contactNo">Contact No:</label>
                    <input type="text" id="contactNo" name="contactNo" required>
                </div>
                    
                <div class="form-group">
                    <label for="ActiveState">Active State:</label>
                    <select id="ActiveState" name="ActiveState" required>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                    
                <div class="form-group">
                    <label for="Address">Address:</label>
                    <input type="text" id="Address" name="Address" required>
                </div>

                <div class="form-group">
                    <label for="District">Suburbs</label>
                    <select id="District" name="District" required>
                        <option value="Dehiwala">Dehiwala-Mount Lavinia</option>
                        <option value="Nugegoda">Nugegoda</option>
                        <option value="Rajagiriya">Rajagiriya</option>
                        <option value="Battaramulla">Battaramulla</option>
                        <option value="Kotte">Kotte</option>
                        <option value="Malabe">Malabe</option>
                        <option value="Kohuwala">Kohuwala</option>
                        <option value="Nawala">Nawala</option>
                        <option value="Pamankada">Pamankada</option>
                        <option value="Wellawatte">Wellawatte</option>
                        <option value="Bambalapitiya">Bambalapitiya</option>
                        <option value="Kirulapone">Kirulapone</option>
                        <option value="Kolonnawa">Kolonnawa</option>
                        <option value="Ethul Kotte">Ethul Kotte</option>
                        <option value="Maharagama">Maharagama</option>
                    </select><br>
                </div>
                    
                <div class="form-group">
                    <label for="Email">Email:</label>
                    <input type="text" id="Email" name="Email" required>
                </div>
                    
                <div class="form-group">
                    <label for="Manager">Manager:</label>
                    <?php
                        echo "
                            <select id='Manager' name='Manager' required>
                                <option value=''>Select Manager</option>";

                        foreach ($managers as $manager) {
                            echo "<option value='$manager->EmployeeNo'>$manager->EmployeeNo</option>";
                        }

                        echo "</select><br><br>";
                    ?>
                </div>
                    
                    <input class="bluebutton" type="submit" value="Submit">
        
                </form>
                </div>
        </section>
    </div>
    
</body>
</html>
