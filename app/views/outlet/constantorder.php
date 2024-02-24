<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/tables.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/cart.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <h1 style="background-color:Lightbrown;">Outlet Manager Dashboard</h1>
    <title>Constant Orders</title>
</head>
<body>
      
       <?php
        include "omnavbar2.php";
    ?>


<h1>Constant Orders</h1>

     <script>

        var BASE_URL = "<?php echo BASE_URL; ?>";

        function dashboard(){
            window.location.href = BASE_URL + "outletControls/index";
        }

        function more(unique_id){
            window.location.href = BASE_URL + "outletControls/moredetails/" + unique_id;
        }
     </script>
</body>
</html>