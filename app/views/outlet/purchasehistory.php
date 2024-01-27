
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/tables.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/cart.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <title>Purchase History</title>

</head>
<body>
    
       <?php
        include "omnavbar2.php";
    ?>
<h1> Purchase History </h1>

<?php
        
            echo "<table>";

            echo "<tr>
                <th>Order ID</th>
                <th>Placed By</th>
                <th>Order Date</th>
                <th>Delivery Date</th>
                <th>Payment Status</th>
                <th>Delivery Status</th>
                <th>Order Status</th>
                <th>Total</th>
                <th>Deliver By</th>
                <th>Unique ID</th>
                <th>Deliver Address</th>
                </tr>";

            echo "</table>";
    
    ?>

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



