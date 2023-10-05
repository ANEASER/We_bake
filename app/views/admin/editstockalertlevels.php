<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/main.css">
    <title>Edit Stock Item</title>
</head>
<body >
    <h1 class="header">Edit Stock Item</h1>
    <div class="container">
        <div class="sub-container navbar">
            <a href="/admin" class="navbutton">Back</a>
        </div>


        <div class="sub-container content">
            <form class="form-group" method="POST" style="padding: 3%;">
    
                <label for="minimum">Minimum:</label><br>
                <input type="number" id="minimum" name="minimum" required><br><br>

                <label for="critical">Critical:</label><br>
                <input type="number" id="critical" name="critical" required><br><br>

                <input class="button" type="submit" value="Submit">
            </form>
        </div>
    </div>
</body>
</html>
