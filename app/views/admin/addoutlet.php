<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://localhost/we_bake/app/views/admin/adminstyle.css">
    <title>Add Outlet</title>
</head>
<body style="font-weight: 800">
    
    <div class="container">
        <div class="sub-container navbar">
            <h1 class="dashboard">Add Outlet</h1>
            <button class="navbutton" onclick="back()">Back</button>
        </div>

        <div class="content">
            <form method="POST">
                <div class="form-group">
                <label for="DOS">Date of Establishment:</label><br>
                <input type="date" id="DOS" name="DOS" required><br><br>
                </div>

                <div class="form-group">
                <label for="contactNo">Contact No:</label><br>
                <input type="text" id="contactNo" name="contactNo" required><br><br>
                </div>

                <div class="form-group">
                <label for="ActiveState">Active State:</label><br>
                <select id="ActiveState" name="ActiveState" required>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select><br><br>
                </div>

                <div class="form-group">
                <label for="Address">Address:</label><br>
                <input type="text" id="Address" name="Address" required><br><br>
                </div>

                <div class="form-group">
                <label for="OutletID">Outlet ID:</label><br>
                <input type="text" id="OutletID" name="OutletID" required><br><br>
                </div>

                <div class="form-group">
                <label for="Email">Email:</label><br>
                <input type="text" id="Email" name="Email" required><br><br>
                </div>

                <div class="form-group">
                <label for="Manager">Manager:</label><br>
                <input type="text" id="Manager" name="Manager" required><br><br>
                </div>

                <div class="button-container"> 
                <input class="button"  type="submit" value="Submit">
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
