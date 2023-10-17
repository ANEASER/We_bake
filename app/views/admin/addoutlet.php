<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://localhost/we_bake/public/css/main.css">
    <title>Add Outlet</title>
</head>
<body style="font-weight: 800">
    <h1 class="header">Add Outlet</h1>
    <div class="container">
        <div class="sub-container navbar">
            <button class="navbutton" onclick="back()">Back</button>
        </div>

        <div class="sub-container content">
            <form class="form-group" method="POST" style="padding: 3%;">
                <label for="DOS">Date of Establishment:</label><br>
                <input type="date" id="DOS" name="DOS" required><br><br>

                <label for="contactNo">Contact No:</label><br>
                <input type="text" id="contactNo" name="contactNo" required><br><br>

                <label for="ActiveState">Active State:</label><br>
                <select id="ActiveState" name="ActiveState" required>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select><br><br>

                <label for="Address">Address:</label><br>
                <input type="text" id="Address" name="Address" required><br><br>

                <label for="OutletID">Outlet ID:</label><br>
                <input type="text" id="OutletID" name="OutletID" required><br><br>

                <label for="Email">Email:</label><br>
                <input type="text" id="Email" name="Email" required><br><br>

                <label for="Manager">Manager:</label><br>
                <input type="text" id="Manager" name="Manager" required><br><br>

                <input class="button"  type="submit" value="Submit">
            </form>
        </div>
    </div>
    <script>
        function back() {
            window.location.href = "../AdminControls";
        }
    </script>
</body>
</html>
