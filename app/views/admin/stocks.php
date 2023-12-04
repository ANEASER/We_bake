<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock</title>
</head>
<body>

    <?php
        include "adminnav.php"
    ?>

    <button onclick="edit()">Update</button></td>
            
    <script>
        function edit() {
            window.location.href = "http://localhost/we_bake/public/AdminControls/EditStock";
        }
    </script>
</body>
</html>
           