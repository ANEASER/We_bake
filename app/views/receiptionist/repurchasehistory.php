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
        include "recnavbar.php";
    ?>
    <br><br>
    <br><br>
    
    <section style="display:flex;justify-content:space-around; padding-top:3%; width:100%">
    <?php
        
            echo "<table>";
            echo "<tr>
                <th>Order ID</th>
                <th>Placed By</th>
                <th>Order Date</th>
                <th>Payment Status</th>
                <th>Delivery Status</th>
                <th>Order Status</th>
                <th>Total(Rs)</th>
                <th>Deliver By</th>
                <th>Unique ID</th>
                <th>Deliver Address</th>
             
                <th>More</th>

            </tr>";

            foreach($orders as $order){ 

                if($order->orderstatus == "finished" || $order->orderstatus == "cancelled"){
                    echo "<tr>";
                    echo "<td>".$order->orderid."</td>";
                    echo "<td>".$order->placeby."</td>";
                    echo "<td>".$order->orderdate."</td>";
                    echo "<td>".$order->paymentstatus."</td>";
                    echo "<td>".$order->deliverystatus."</td>";
                    echo "<td>".$order->orderstatus."</td>";
                    echo "<td>".$order->total.".00</td>";
                    echo "<td>".$order->deliverby."</td>";
                    echo "<td>".$order->unique_id."</td>";
                    echo "<td>".$order->deliver_address."</td>";
                    
                    echo "<td><button class='bluebutton' onclick='more(\"" . $order->unique_id . "\")'>More</button></td>";

                    echo "</tr>";
                }    
            }    
            
            echo "</table>";
    
    ?>
   

    <script>
        var BASE_URL = "<?php echo BASE_URL; ?>";

        function cancel(orderid){
            window.location.href = BASE_URL + "RecieptionControls/cancelOrder/" + orderid;
        }

        function more(unique_id){
            window.location.href = BASE_URL + "OrderControls/moredetails/" + unique_id;
        }
    </script>

</body>

</html>
