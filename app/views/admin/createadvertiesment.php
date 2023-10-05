<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://localhost/we_bake/public/css/main.css">
    <title>Create Add</title>
</head>
<body>
    <h1 class="header" >Create Add</h1>
    <div class="container">
        <div class="sub-container navbar">
            <a href="/admin" class="navbutton">Back</a>
        </div>

        <div class="sub-container content">
            <form class="form-group" method="POST" enctype="multipart/form-data">
                <label for="image1">Upload Image 1:</label>
                <input type="file" name="image1" id="image1" accept="image/*" required><br><br>
        
                <label for="image2">Upload Image 2:</label>
                <input type="file" name="image2" id="image2" accept="image/*" required><br><br>
        
                <input class="button" type="submit" name="submit" value="Upload">
            </form>
        </div>
    </div>
</body>
</html>
