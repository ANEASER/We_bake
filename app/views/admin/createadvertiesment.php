<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://localhost/we_bake/app/views/admin/adminstyle.css">
    <title>Create Add</title>
</head>
<body>
    
    <div class="container">
    <?php
        include "adminnav.php"
    ?>

        <div class="content">
            <form method="POST" enctype="multipart/form-data">
            
            <div class="form-group">
                <label for="image1">Upload Image 1:</label>
                <input type="file" name="image1" id="image1" accept="image/*" required><br><br>
            </div>

            <div class="form-group">
                <label for="image2">Upload Image 2:</label>
                <input type="file" name="image2" id="image2" accept="image/*" required><br><br>
            </div> 
            <div class="button-container"> 
                <input class="button" type="submit" name="submit" value="Upload">
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
