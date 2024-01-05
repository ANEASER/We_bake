<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/tables.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <title>Purchase History</title>
</head>
<body>
        <?php
            include 'customernav.php';
        ?>
        
     <?php

        echo '<table>';
        echo '<tr>
            <th>Order ID</th>
            <th>Order Date</th>
            <th>Deliver Address</th>
            <th>Delivery Status</th>
            <th>Order Status</th>
            <th>Payment Status</th>
            <th>Total</th>
            <th>More</th>
        </tr>';

        foreach($orders as $order){
            
            echo '<tr>';
            echo '<td>' . $order->orderid . '</td>';
            echo '<td>' . $order->orderdate . '</td>';
            echo '<td>' . $order->deliver_address . '</td>';
            echo '<td>' . $order->deliverystatus . '</td>';
            echo '<td>' . $order->orderstatus . '</td>';
            echo '<td>' . $order->paymentstatus . '</td>';
            echo '<td>' . $order->total . '</td>';
            echo "<td><button class='bluebutton' onclick='more(\"" . $order->unique_id . "\")'>More</button></td>";
            echo '</tr>';
            
        }
        echo '</table>';
     ?>

     <script>

        var BASE_URL = "<?php echo BASE_URL; ?>";

        function dashboard(){
            window.location.href = BASE_URL + "CustomerControls/index";
        }

        function more(unique_id){
            window.location.href = BASE_URL + "CustomerControls/moredetails/" + unique_id;
        }
     </script>
</body>
</html>
