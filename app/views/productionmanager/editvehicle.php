<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://localhost/we_bake/app/views/admin/adminstyle.css">
    <title>Edit Delivery Vehicle</title>
</head>
<body style="font-weight: 800">
    
    <div class="container">
        <div class="navbar nav">
            <h1>Edit Delivery Vehicle</h1>
            <button class="navbutton" onclick="back()">Back</button>
        </div>

        <div class="content">
            <form method="POST" style="padding: 3%;">
            <div class="form-group">
                <label for="registrationnumber">Registration Number:</label><br>
                <input type="text" id="registrationnumber" name="registrationnumber" required><br><br>
            </div>
                
            <div class="form-group">
                <label for="type">Type:</label><br>
                <input type="text" id="type" name="type" required><br><br>
            </div>


            <div class="form-group">
                <label for="capacity">Capacity:</label><br>
                <input type="number" id="capacity" name="capacity" required><br><br>
            </div>

            <div class="form-group">
                <label for="availability">Availability:</label><br>
                <select id="availability" name="availability" required>
                    <option value="1">Available</option>
                    <option value="0">Not Available</option>
                </select><br><br>
            </div>

            <div class="form-group">
                <label for="vehicleno">Vehicle No:</label><br>
                <input type="text" id="vehicleno" name="vehicleno" required><br><br>
            </div>

            <div class="form-group">
                <label for="chassinumber">Chassis Number:</label><br>
                <input type="text" id="chassinumber" name="chassinumber" required><br><br>
            </div>

            <div class="form-group">
                <label for="enginenumber">Engine Number:</label><br>
                <input type="text" id="enginenumber" name="enginenumber" required><br><br>
            </div>
            
            <div class="form-group">
                <label for="modelname">Model Name:</label><br>
                <input type="text" id="modelname" name="modelname" required><br><br>
            </div>

            <div class="button-container">
                <input class="formbutton" type="submit" value="Submit">
            </div>
            
            </form>
        </div>
    </div>
    <script>
        function back() {
            window.location.href = "../pmControls";   
        }
    </script>
</body>
</html>