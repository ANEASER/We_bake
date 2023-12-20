<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase History</title>
</head>
<body>
     <h1>Purchase History</h1>
     <button onclick="dashboard"> dash </button>
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
            echo '</tr>';
            
        }
        echo '</table>';
     ?>

     <script>

        var BASE_URL = "<?php echo BASE_URL; ?>";

        function dashboard(){
            window.location.href = BASE_URL + "CustomerControls/index";
        }
     </script>
</body>
</html>
