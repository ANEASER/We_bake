<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Production Manager Dashboard</title>
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/tables.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/cart.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/navbar.css">
   
</head>
<body>
    <?php
        require('pmnavbar.php');
    ?>
    <div style="display: flex; flex-direction:row; justify-content:space-between; padding:2%;">
                
                <form method="GET" action="<?php echo BASE_URL; ?>OrderControls/searchOrders" class="search" style="display: flex; flex-direction:row;">
                    <?php
                        if (isset($_GET['search'])) {
                            echo '<input type="text" id="search" name="search" placeholder="Enter Order ID or Place BY" value="' . $_GET['search'] . '" class="searchbox">';
                            echo '<input type="submit" value="Search" class="searchbutton">';
                            echo '<button class="searchbutton" onclick="clearSearch(); return false;">Clear Search</button>';
                        } else {
                            echo '<input type="text" id="search" name="search" placeholder="Enter Order ID or Place BY" class="searchbox">';
                            echo '<input type="submit" value="Search" class="searchbutton">';
                        }
                    ?>
                </form>

    
                <ul style="display: flex; padding: 0; list-style: none; margin: 0;">
                    <li style="margin-right: 10px;"><a onclick="showpendingOrdersTable(this)" style="padding: 5px;">Pending Orders</a></li>
                    <li style="margin-right: 10px;"><a onclick="showPickupOrderTable(this)" style="padding: 5px;">Pickup Orders</a></li>
                    <li style="margin-right: 10px;"><a onclick="showDeliverOrderTable(this)" style="padding: 5px;">Deliver Orders</a></li>
                    <li style="margin-right: 10px;"><a onclick="showOnDeliverOrderTable(this)" style="padding: 5px;">OnDeliver Orders</a></li>
                    <li style="margin-right: 10px;"><a onclick="showCompletedOrderTable(this)" style="padding: 5px;">Completed Orders</a></li>
                </ul>
        </div>
    <section style="display:flex;justify-content:space-around; padding-top:3%; width:100%">
    <?php
            echo "<div id='pendingOrdersTable'>";
            echo "<table>";
            echo "<tr>
                <th>Order REF</th>
                <th>Placed By</th>
                <th>Order Date</th>
                <th>Payment Status</th>
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
                    echo "<td>".$productorder->orderref."</td>";
                    echo "<td>".$productorder->placeby."</td>";
                    echo "<td>".$productorder->orderdate."</td>";
                    echo "<td>".$productorder->paymentstatus."</td>";
                    echo "<td>".$productorder->orderstatus."</td>";
                    echo "<td>".$productorder->total."</td>";
                    echo "<td>".$productorder->deliverby."</td>";
                    echo "<td>".$productorder->unique_id."</td>";
                    echo "<td>".$productorder->deliver_address."</td>";
                    echo "<td><button class='greenbutton' onclick='Process(".$productorder->orderid.")'>Process</button></td>";
                    echo "<td><button class='redbutton' onclick='cancel(".$productorder->orderid.")'>Cancel</button></td>";
                    echo "<td><button class='bluebutton' onclick='more(\"" . $productorder->unique_id . "\")'>More</button></td>";
                    echo "</tr>";
                }    
            }    
            
            echo "</table>";
            echo "</div>";
    
    ?>
    <?php
            echo "<div id='PickupOrderTable'>";
            echo "<table>";
            echo "<th>Order REF</th>
                <th>Placed By</th>
                <th>Order Date</th>
                <th>Payment Status</th>
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

                if($productorder->orderstatus == "processing" and $productorder->deliverystatus == "pickup"){
                    echo "<tr>";
                    echo "<td>".$productorder->orderref."</td>";
                    echo "<td>".$productorder->placeby."</td>";
                    echo "<td>".$productorder->orderdate."</td>";
                    echo "<td>".$productorder->paymentstatus."</td>";
                    echo "<td>".$productorder->orderstatus."</td>";
                    echo "<td>".$productorder->total."</td>";
                    echo "<td>".$productorder->deliverby."</td>";
                    echo "<td>".$productorder->unique_id."</td>";
                    echo "<td>".$productorder->deliver_address."</td>";
                    echo "<td><button class='greenbutton' onclick='Process(".$productorder->orderid.")'>Process</button></td>";
                    echo "<td><button class='redbutton' onclick='cancel(".$productorder->orderid.")'>Cancel</button></td>";
                    echo "<td><button class='bluebutton' onclick='more(\"" . $productorder->unique_id . "\")'>More</button></td>";
                    echo "</tr>";
                }    
            }
            echo "</table>";
            echo "</div>";
        ?>
    <?php
            echo "<div id='DeliverOrderTable'>";
            echo "<table>";
            echo "<th>Order REF</th>
                <th>Placed By</th>
                <th>Order Date</th>
                <th>Payment Status</th>
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

                if($productorder->orderstatus == "processing" and $productorder->deliverystatus != "pickup"){
                    echo "<tr>";
                    echo "<td>".$productorder->orderref."</td>";
                    echo "<td>".$productorder->placeby."</td>";
                    echo "<td>".$productorder->orderdate."</td>";
                    echo "<td>".$productorder->paymentstatus."</td>";
                    echo "<td>".$productorder->orderstatus."</td>";
                    echo "<td>".$productorder->total."</td>";
                    echo "<td>".$productorder->deliverby."</td>";
                    echo "<td>".$productorder->unique_id."</td>";
                    echo "<td>".$productorder->deliver_address."</td>";
                    echo "<td><button class='greenbutton' onclick='AssignVehicle(".$productorder->orderid.")'>Assighn Vehicle</button></td>";
                    echo "<td><button class='redbutton' onclick='cancel(".$productorder->orderid.")'>Cancel</button></td>";
                    echo "<td><button class='bluebutton' onclick='more(\"" . $productorder->unique_id . "\")'>More</button></td>";
                    echo "</tr>";
                }    
            }
            echo "</table>";
            echo "</div>";
        ?>

    <?php
            echo "<div id='OnDeliverOrderTable'>";
            echo "<table>";
            echo "<th>Order REF</th>
                    <th>Placed By</th>
                    <th>Order Date</th>
                    <th>Payment Status</th>
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

                if($productorder->orderstatus == "ondelivery"){
                    echo "<tr>";
                    echo "<td>".$productorder->orderref."</td>";
                    echo "<td>".$productorder->placeby."</td>";
                    echo "<td>".$productorder->orderdate."</td>";
                    echo "<td>".$productorder->paymentstatus."</td>";
                    echo "<td>".$productorder->orderstatus."</td>";
                    echo "<td>".$productorder->total."</td>";
                    echo "<td>".$productorder->deliverby."</td>";
                    echo "<td>".$productorder->unique_id."</td>";
                    echo "<td>".$productorder->deliver_address."</td>";
                    echo "<td><button class='greenbutton' onclick='Completed(".$productorder->orderid.")'>Complete</button></td>";
                    echo "<td><button class='redbutton' onclick='cancel(".$productorder->orderid.")'>Cancel</button></td>";
                    echo "<td><button class='bluebutton' onclick='more(\"" . $productorder->unique_id . "\")'>More</button></td>";
                    echo "</tr>";
                }    
            }
            echo "</table>";
            echo "</div>";
        ?>



    <?php
            echo "<div id='CompletedOrderTable'>";
            echo "<table>";
            echo "<th>Order REF</th>
                    <th>Placed By</th>
                    <th>Order Date</th>
                    <th>Payment Status</th>
                    <th>Order Status</th>
                    <th>Total</th>
                    <th>Deliver By</th>
                    <th>Unique ID</th>
                    <th>Deliver Address</th>
                    <th>More</th>
                </tr>";

            foreach($data["productorders"] as $productorder) {
                if ($productorder->orderstatus == "finished") {
                    echo "<tr>";
                    echo "<td>".$productorder->orderref."</td>";
                    echo "<td>".$productorder->placeby."</td>";
                    echo "<td>".$productorder->orderdate."</td>";
                    echo "<td>".$productorder->paymentstatus."</td>";
                    echo "<td>".$productorder->orderstatus."</td>";
                    echo "<td>".$productorder->total."</td>";
                    echo "<td>".$productorder->deliverby."</td>";
                    echo "<td>".$productorder->unique_id."</td>";
                    echo "<td>".$productorder->deliver_address."</td>";
                    echo "<td><button class='bluebutton' onclick='more(\"" . $productorder->unique_id . "\")'>More</button></td>";
                    echo "</tr>";
                }
            }
            
            echo "</table>";
            echo "</div>";
        ?>
    </section>
    
    
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

        function AssignVehicle(orderid) {
            window.location.href = BASE_URL +  "PmControls/showassignvehicles/"+orderid;
        }

        function loadVehicles() {
            window.location.href = BASE_URL +  "PmControls/loadVehiclesView";
        }

        function logout() {
            window.location.href = BASE_URL +  "CommonControls/logout";
        }

        function changeActive(link) {
            var links = document.querySelectorAll('body div ul li a');
            links.forEach(function (el) {
                el.classList.remove('active');
            });

            link.classList.add('active');
        }

        function showpendingOrdersTable(link){
            changeActive(link);
            document.getElementById("pendingOrdersTable").style.display = "block";
            document.getElementById("PickupOrderTable").style.display = "none";
            document.getElementById("DeliverOrderTable").style.display = "none";
            document.getElementById("OnDeliverOrderTable").style.display = "none";
            document.getElementById("CompletedOrderTable").style.display = "none";
        }

        function showPickupOrderTable(link){
            changeActive(link);
            document.getElementById("pendingOrdersTable").style.display = "none";
            document.getElementById("PickupOrderTable").style.display = "block";
            document.getElementById("DeliverOrderTable").style.display = "none";
            document.getElementById("OnDeliverOrderTable").style.display = "none";
            document.getElementById("CompletedOrderTable").style.display = "none";
        }

        function showDeliverOrderTable(link){
            changeActive(link);
            document.getElementById("pendingOrdersTable").style.display = "none";
            document.getElementById("PickupOrderTable").style.display = "none";
            document.getElementById("DeliverOrderTable").style.display = "block";
            document.getElementById("OnDeliverOrderTable").style.display = "none";
            document.getElementById("CompletedOrderTable").style.display = "none";
        }

        function showOnDeliverOrderTable(link){
            changeActive(link);
            document.getElementById("pendingOrdersTable").style.display = "none";
            document.getElementById("PickupOrderTable").style.display = "none";
            document.getElementById("DeliverOrderTable").style.display = "none";
            document.getElementById("OnDeliverOrderTable").style.display = "block";
            document.getElementById("CompletedOrderTable").style.display = "none";
        }

        function showCompletedOrderTable(link){
            changeActive(link);
            document.getElementById("pendingOrdersTable").style.display = "none";
            document.getElementById("PickupOrderTable").style.display = "none";
            document.getElementById("DeliverOrderTable").style.display = "none";
            document.getElementById("OnDeliverOrderTable").style.display = "none";
            document.getElementById("CompletedOrderTable").style.display = "block";
        }

        function clearSearch() {
            window.location.href = BASE_URL +  "BillingControls";
        }

        function more(unique_id) {
            
            var url = BASE_URL + "OrderControls/moredetails/" + unique_id ;

            window.location.href = url;
        }

        document.addEventListener('DOMContentLoaded', function () {
            var firstLink = document.querySelector('body div ul li a');
            if (firstLink) {
                changeActive(firstLink);
                showpendingOrdersTable(firstLink);
            }
        });

    </script>
</body>
</html>