<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/main.css">
    <title>Edit Delivery Vehicle</title>
</head>
<body style="font-weight: 800">
    <h1 style="background-color: #BAA484; text-align: center; padding: 2%;">Edit Delivery Vehicle</h1>
    <div class="container">
        <div class="sub-container navbar nav">
            <a href="/admin" class="navbutton">Back</a>
        </div>

        <div class="sub-container content">
            <form action="process_vehicle.php" method="POST" style="padding: 3%;">
                <label for="registrationnumber">Registration Number:</label><br>
                <input type="text" id="registrationnumber" name="registrationnumber" required><br><br>

                <label for="type">Type:</label><br>
                <input type="text" id="type" name="type" required><br><br>

                <label for="capacity">Capacity:</label><br>
                <input type="number" id="capacity" name="capacity" required><br><br>

                <label for="availability">Availability:</label><br>
                <select id="availability" name="availability" required>
                    <option value="1">Available</option>
                    <option value="0">Not Available</option>
                </select><br><br>

                <label for="vehicleno">Vehicle No:</label><br>
                <input type="text" id="vehicleno" name="vehicleno" required><br><br>

                <label for="chassinumber">Chassis Number:</label><br>
                <input type="text" id="chassinumber" name="chassinumber" required><br><br>

                <label for="enginenumber">Engine Number:</label><br>
                <input type="text" id="enginenumber" name="enginenumber" required><br><br>

                <label for="modelname">Model Name:</label><br>
                <input type="text" id="modelname" name="modelname" required><br><br>

                <input class="button" type="submit" value="Submit">
            </form>
        </div>
    </div>
</body>
</html>
