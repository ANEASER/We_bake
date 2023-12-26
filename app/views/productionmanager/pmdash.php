<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Production Manager Dashboard</title>
   
</head>
<body>
    <h1>PM dash</h1>
    <ul>
        <li><button class="navbutton" onclick="loadVehicles()">Vehicles</button></li>
        <li><button class="navbutton" onclick="logout()">Log Out</button></li>
    </ul>

    <h1>Pending orders</h1>
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
                <th>Update</th>
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
                    echo "<td><button onclick='Process(".$productorder->orderid.")'>Process</button></td>";
                    echo "<td><button onclick='cancel(".$productorder->orderid.")'>Cancel</button></td>";
                    echo "<td><button onclick='more(\"" . $productorder->unique_id . "\")'>More</button></td>";
                    echo "</tr>";
                }    
            }    
            
            echo "</table>";
    
    ?>
    <h1>Processed orders Pickup</h1>
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
                <th>Update</th>
                <th>More</th>
            </tr>";

            foreach($data["productorders"] as $productorder){ 

                if($productorder->orderstatus == "processing" and $productorder->deliverystatus == "pickup"){
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
                    echo "<td><button onclick='Completed(".$productorder->orderid.")'>Completed</button></td>";
                    echo "<td><button onclick='more(\"" . $productorder->unique_id . "\")'>More</button></td>";
                    echo "</tr>";
                }    
            }
            echo "</table>";
        ?>

    <h1>Processed orders to Deliver</h1>
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
                <th>Update</th>
                <th>More</th>
            </tr>";

            foreach($data["productorders"] as $productorder){ 

                if($productorder->orderstatus == "processing" and $productorder->deliverystatus != "pickup"){
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
                    echo "<td><button onclick='AssignVehicle(".$productorder->orderid.")'>AssignVehicle</button></td>";
                    echo "<td><button onclick='more(\"" . $productorder->unique_id . "\")'>More</button></td>";
                    echo "</tr>";
                }    
            }
            echo "</table>";
        ?>

    <h1>Processed orders OnDeliver</h1>
    <?php
        
            echo "<table>";
            echo "<tr>
                <th>Order ID</th>
                <th>Placed By</th>
                <th>Placed By</th>
                <th>Delivery Date</th>
                <th>Payment Status</th>
                <th>Delivery Status</th>
                <th>Order Status</th>
                <th>Total</th>
                <th>Deliver By</th>
                <th>Unique ID</th>
                <th>Deliver Address</th>
                <th>Update</th>
                <th>More</th>
            </tr>";

            foreach($data["productorders"] as $productorder){ 

                if($productorder->orderstatus == "ondelivery"){
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
                    echo "<td><button onclick='Completed(".$productorder->orderid.")'>Completed</button></td>";
                    echo "<td><button onclick='more(\"" . $productorder->unique_id . "\")'>More</button></td>";
                    echo "</tr>";
                }    
            }
            echo "</table>";
        ?>


    <h1>Completed orders</h1>
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

            foreach($data["productorders"] as $productorder) {
                if ($productorder->orderstatus == "finished") {
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
                    echo "<td><button onclick='more(\"" . $productorder->unique_id . "\")'>More</button></td>";
                    echo "</tr>";
                }
            }
            
            echo "</table>";
        ?>
    
    
    
    <script>
        
        var BASE_URL = "<?php echo BASE_URL; ?>";

        function Process(orderid) {
            window.location.href = BASE_URL +  "PmControls/processOrder/"+orderid;
        }

        function Completed(orderid) {
            window.location.href = BASE_URL +  "PmControls/completedOrder/"+orderid;
        }

        function cancel(orderid) {
            window.location.href = BASE_URL +  "PmControls/cancelOrder/"+orderid;
        }

        function more(unique_id) {
            window.location.href = BASE_URL +  "PmControls/moredetails/"+unique_id;
        }

        function AssignVehicle(orderid) {
            window.location.href = BASE_URL +  "PmControls/showassignvehicles/"+orderid;
        }

        function loadVehicles() {
            window.location.href = BASE_URL +  "PmControls/loadVehiclesView";
        }

        function logout() {
            window.location.href = BASE_URL +  "CommonControls/logout";
        }

    </script>
</body>
</html>