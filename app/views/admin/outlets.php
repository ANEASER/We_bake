<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<body style="font-weight: 800">
   
    <?php
        include "adminnav.php"
    ?>

    <h1>Outlet</h1>
  
        <button onclick="add()">Add New Outlets</button>
        <button onclick="edit()">Edit Outlets</button>
    <script>

        function add() {
            window.location.href = BASE_URL + "AdminControls/addOutlet";
        }

        function edit() {
            window.location.href = BASE_URL + "AdminControls/EditOutlet";
        }
    </script>

</body>
</html>
           