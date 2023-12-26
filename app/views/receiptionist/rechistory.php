<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receptionist_Purchase History</title>
</head>
<body>
    <?php
        include "recnavbar.php";
    ?>
    <h1>Receptionist_Purchase History</h1>
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
                <th>Cancel</th>
                <th>More</th>
            </tr>";

            foreach($data["productorders"] as $productorder){ 

                if($productorder->orderstatus == "pending"){
                    echo "<tr>";
                    echo "<td>".$productorder->orderid."</td>";
                    echo "<td>".$productorder->placeby."</td>";
                    echo "<td>".$productorder->orderdate."</td>";
                    echo "<td>".$productorder->paymentstatus."</td>";
                    echo "<td>".$productorder->deliverystatus."</td>";
                    echo "<td>".$productorder->orderstatus."</td>";
                    echo "<td>".$productorder->total."</td>";
                    echo "<td>".$productorder->deliverby."</td>";
                    echo "<td>".$productorder->unique_id."</td>";
                    echo "<td>".$productorder->deliver_address."</td>";
                    echo "<td><button onclick='cancel(".$productorder->orderid.")'>Cancel</button></td>";
                    echo "<td><button onclick='more(\"" . $productorder->unique_id . "\")'>More</button></td>";
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
            window.location.href = BASE_URL + "RecieptionControls/moredetails/" + unique_id;
        }
    </script>
</body>
</html>
