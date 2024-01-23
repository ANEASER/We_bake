<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
<body>
   
    <?php
        include "adminnav.php"
    ?>

  
        <button onclick="add()">Add New Outlets</button>
        <button onclick="edit()">Edit Outlets</button>
    <script>

        var BASE_URL = "<?php echo BASE_URL; ?>";
        
        function add() {
            window.location.href = BASE_URL + "AdminControls/addOutlet";
        }

        function edit() {
            window.location.href = BASE_URL + "AdminControls/EditOutlet";
        }
    </script>

</body>
</html>
           