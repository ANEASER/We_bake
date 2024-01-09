<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing Clerk</title>
</head>
<body>
    <h1> Billing Clerk </h1>
    <h3>Pending</h3>
    <?php
        
            echo "<table>";
            echo "<tr>
                <th>Order ID</th>
                <th>Placed By</th>
                <th>Order Date</th>
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

                if($productorder->orderstatus == "pending" && $productorder->paymentstatus == "pending"){
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
                    echo "<td><button onclick='Process(\"" . $productorder->orderid. "\", \"" . $productorder->paymentstatus. "\")'>Complete</button></td>";
                    echo "<td><button onclick='more(\"" . $productorder->unique_id . "\", \"" . $productorder->orderid. "\")'>More</button></td>";

                    echo "</tr>";
                }    
            }    
            
            echo "</table>";
    
    ?>

<h3>Advanced</h3>

<?php
        
        echo "<table>";
        echo "<tr>
            <th>Order ID</th>
            <th>Placed By</th>
            <th>Order Date</th>
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

            if($productorder->orderstatus == "pending" && $productorder->paymentstatus == "advanced"){
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
                echo "<td><button onclick='Process(\"" . $productorder->orderid. "\", \"" . $productorder->paymentstatus. "\")'>Complete</button></td>";
                echo "<td><button onclick='more(\"" . $productorder->unique_id . "\", \"" . $productorder->orderid. "\")'>More</button></td>";
                echo "</tr>";
            }    
        }    
        
        echo "</table>";

?>

<h3>Paid</h3>

<?php
        
        echo "<table>";
        echo "<tr>
            <th>Order ID</th>
            <th>Placed By</th>
            <th>Order Date</th>
            <th>Payment Status</th>
            <th>Delivery Status</th>
            <th>Order Status</th>
            <th>Total</th>
            <th>Deliver By</th>
            <th>Unique ID</th>
            <th>Deliver Address</th>
            <th>More</th>
        </tr>";

        foreach($data["productorders"] as $productorder){ 

            if($productorder->orderstatus == "pending" && $productorder->paymentstatus == "paid"){
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
                echo "<td><button onclick='more(\"" . $productorder->unique_id . "\", \"" . $productorder->orderid. "\")'>More</button></td>";
                echo "</tr>";
            }    
        }    
        
        echo "</table>";

    ?>
    <h3>Closed</h3>
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

                if($productorder->orderstatus == "closed"){
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
                    echo "<td><button onclick='more(\"" . $productorder->unique_id . "\", \"" . $productorder->orderid. "\")'>More</button></td>";
                    echo "</tr>";
                }    
            }    
            
            echo "</table>";
    
    ?>
    <script>
        
        var BASE_URL = "<?php echo BASE_URL; ?>";

        function Process(orderid, paymentstatus) {
            window.location.href = BASE_URL +  "BillingControls/processOrder/"+orderid+"/"+paymentstatus;
        }

        function more(orderid,unique_id) {
            
            var url = BASE_URL + "BillingControls/moredetails/" + unique_id + "/" + orderid;

            window.location.href = url;
        }

    </script>
</body>
</html>
