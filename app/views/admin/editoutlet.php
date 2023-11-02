<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Outlet</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/we_bake/app/views/admin/adminstyle.css">
</head>
<body>
   
    <div class="container">
    <?php
        include "adminnav.php"
    ?>

        <div class="content">
            <form method="POST">
                <div class="form-group">
                    <label for="DOS">Date of Establishment:</label><br>
                    <input type="date" id="DOS" name="DOS" ><br><br>
                </div> 
                <div class="form-group">
                    <label for="contactNo">Contact No:</label><br>
                    <input type="text" id="contactNo" name="contactNo" ><br><br>
                </div> 
                <div class="form-group"> 
                    <label for="ActiveState">Active State:</label><br>
                    <select id="ActiveState" name="ActiveState" >
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select><br><br>
                </div> 

                <div class="form-group"> 
                    <label for="Address">Address:</label><br>
                    <input type="text" id="Address" name="Address" ><br><br>
                </div>

                <div class="form-group"> 
                    <label for="OutletID">Outlet ID:</label><br>
                    <input type="text" id="OutletID" name="OutletID" ><br><br>
                </div>

                <div class="form-group"> 
                    <label for="Email">Email:</label><br>
                    <input type="email" id="Email" name="Email" ><br><br>
                </div> 

                <div class="form-group"> 
                    <label for="Manager">Manager:</label><br>
                    <input type="text" id="Manager" name="Manager" ><br><br>
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