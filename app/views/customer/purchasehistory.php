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
            include 'customernav.php';
        ?>
    
    <section style="display:flex;justify-content:space-around; padding-top:3%">
     <?php

        echo '<table>';
        echo '<tr>
            <th>ORDER REF</th>
            <th>ORDER DATE</th>
            <th>DELIVERY ADDRESS</th>
            <th>DELIVERY STATUS</th>
            <th>ORDER STATUS</th>
            <th>PAYMENT STATUS</th>
            <th>TOTAL</th>
            <th>MORE</th>
        </tr>';;

        foreach($orders as $order){
            
            echo '<tr>';
            echo '<td>' . $order->orderref. '</td>';
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
    </section>

     <script>

        var BASE_URL = "<?php echo BASE_URL; ?>";

        function dashboard(){
            window.location.href = BASE_URL + "CustomerControls/index";
        }

        function more(unique_id){
            window.location.href = BASE_URL + "OrderControls/moredetails/" + unique_id;
        }
     </script>
</body>
</html>
