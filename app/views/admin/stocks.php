<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <title>Stock</title>
</head>
<body>
    <?php
        include "adminnav.php"
    ?>
    <button onclick="edit()">Update</button></td>
            
    <script>
        
        var BASE_URL = "<?php echo BASE_URL; ?>";

        function edit() {
            window.location.href = BASE_URL + "AdminControls/EditStock";
        }
    </script>
</body>
</html>
           