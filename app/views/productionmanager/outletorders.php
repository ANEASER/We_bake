<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>media/css/tables.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>media/css/cart.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>media/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>media/css/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
        .hover{
            display:flex;
            padding :8px;
        }
        .button {
            border: none;
            color: white;
            padding: 10px;
            text-align: center;
            text-decoration: none; 
            justify-content: center;
            align-items: right;
            font-size: 16px;
            border-radius: 9px;
        }
        .red {
            background-color: #e74c3c;
        }
        .green {
            background-color: #2ecc71;
        }
        .blue {
            background-color: #3498db;
        }
    </style>
    <title>Outlet Orders</title>
</head>
<body>
    <?php include 'pmnavbar.php'; ?>

    <div class="searchpanel">
        <form method="GET" action="<?php echo BASE_URL;?>OrderControls/searchOrders" class="search" style="display:flex; flex-direction:row;">
        <?php
        if(isset($_GET['search'])){
            echo '<input type="text" id="search" name="search" placeholder="Enter Order ID or Place BY" value="'.$_GET['search'].'" class="searchbox">';
            echo '<input type="submit" value="Search" class="button green">';
            echo '<button class="button green" onclick="clearSearch(); return false;">Clear Search</button>';
        }
        else{
            echo '<input type="text" id="search" name="search" placeholder="Enter Order ID or Place BY" value="" class="searchbox">';
            echo '<input type="submit" value="Search" class="button green">';
        }
        ?>
        </form>
        
        <ul style="display: flex;margin-left: 40%;">
            <ul style="display: flex; padding: 0; list-style: none; margin: 0;">
                <li style="margin-right: 10px;"><a class="hover"id="home" onclick="showPendingOrderTable(this)">PendingOrders</a></li>
                <li style="margin-right: 10px;"><a class="hover" onclick="showPickupOrderTable(this)">PickupOrders</a></li>
                <li style="margin-right: 10px;"><a class="hover" onclick="showDeliveryOrderTable(this)">ToDeliverOrders</a></li>
                <li style="margin-right: 10px;"><a class="hover" onclick="showOnDeliveryOrderTable(this)">OnDeliveryOrders</a></li>
                <li style="margin-right: 10px;"><a class="hover" onclick="showCompletedOrderTable(this)">CompletedOrders</a></li>
                <li style="margin-right: 10px;"><a class="hover" onclick="showCancledOrderTable(this)">CancledOrders</a></li>
            </ul>
        </ul>
    </div>

    <section style="display:flex;justify-content:space-around; width:100%">
        
        <!-- Pending Orders -->
        <?php
        echo "<div id='PendingOrdersTable' style='display:none'>";
        echo "<table style='margin:auto; margin-top: 20px; font-size:15px;'>";
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
                <th>Update Order</th>
                <th>Cancel Order</th>
                <th>More Details</th>
            </tr>";
            
            foreach ($productorder as $ProductOrder){
                if ($ProductOrder->orderstatus == "pending"){
                    echo "<tr>";
                    echo "<td>".$ProductOrder->orderref."</td>";
                    echo "<td>".$ProductOrder->placeby."</td>";
                    echo "<td>".$ProductOrder->orderdate."</td>";
                    echo "<td>".$ProductOrder->paymentstatus."</td>";
                    echo "<td>".$ProductOrder->orderstatus."</td>";
                    echo "<td>".$ProductOrder->total."</td>";
                    echo "<td>".$ProductOrder->deliverby."</td>";
                    echo "<td>".$ProductOrder->unique_id."</td>";
                    echo "<td>".$ProductOrder->deliver_address."</td>";
                    if($ProductOrder->paymentstatus == "paid" || $ProductOrder->paymentstatus == "advanced"){
                        echo "<td><button class='button green' onclick='process(".$ProductOrder->orderid.", \"".$ProductOrder->deliverystatus."\")'>Process</button></td>";
                    }
                    else{
                        echo "<td>Incomplete Payment</td>";
                    }
                    echo "<td><button class='button red' onclick='cancel(".$ProductOrder->orderid.")'>Cancel</button></td>";
                    echo "<td><button class='button blue' onclick='more(\"" . $ProductOrder->unique_id . "\")'>More</button></td>";
                    echo "</tr>";
                }
            }
        echo "</table>";
        echo "</div>";
        ?>

        <!-- Pickup Orders -->

        <?php
        echo "<div id='PickupOrderTable' style='display:none'>";
        echo "<table style='margin:auto; margin-top: 20px; font-size:15px;'>";
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
                <th>Complete Order</th>
                <th>Cancel Order</th>
                <th>More Details</th>
            </tr>";
            
            foreach ($productorder as $ProductOrder){
                if ($ProductOrder->orderstatus == "processing" && ($ProductOrder->paymentstatus == "paid" || $ProductOrder->paymentstatus == "advanced") && $ProductOrder->deliverystatus == "outletpickup" ) { //&& $ProductOrder->orderdate == date('Y-m-d')

                    echo "<tr>";
                    echo "<td>".$ProductOrder->orderref."</td>";
                    echo "<td>".$ProductOrder->placeby."</td>";
                    echo "<td>".$ProductOrder->orderdate."</td>";
                    echo "<td>".$ProductOrder->paymentstatus."</td>";
                    echo "<td>".$ProductOrder->orderstatus."</td>";
                    echo "<td>".$ProductOrder->total."</td>";
                    echo "<td>".$ProductOrder->deliverby."</td>";
                    echo "<td>".$ProductOrder->unique_id."</td>";
                    echo "<td>".$ProductOrder->deliver_address."</td>";
                    echo "<td><button class='button green' onclick='completed(".$ProductOrder->orderid.")'>Complete</button></td>";
                    echo "<td><button class='button red' onclick='cancel(".$ProductOrder->orderid.")'>Cancel</button></td>";
                    echo "<td><button class='button blue' onclick='more(\"" . $ProductOrder->unique_id . "\")'>More</button></td>";
                    echo "</tr>";
                }
            }
        echo "</table>";
        echo "</div>";
        ?>

        <!-- Delivery Orders -->

        <?php
        echo "<div id='DeliveryOrderTable' style='display:none'>";
        echo "<table style='margin:auto; margin-top: 20px; font-size:15px;'>";
        echo "<th>Order REF</th>
                <th>Placed By</th>
                <th>Order Date</th>
                <th>Payment Status</th>
                <th>Order Status</th>
                <th>Total</th>
                <th>Deliver By</th>
                <th>Unique ID</th>
                <th>Deliver Address</th>
                <th>Assign Vehicle</th>
                <th>Cancel Order</th>
                <th>More Details</th>
            </tr>";

            foreach($productorder as $ProductOrder){ 

                if($ProductOrder->orderstatus == "processing" && ($ProductOrder->paymentstatus == "paid" || $ProductOrder->paymentstatus == "advanced") && ($ProductOrder->deliverystatus == "outletdelivery")) { //&& $ProductOrder->orderdate == date('Y-m-d')

                    echo "<tr>";
                    echo "<td>".$ProductOrder->orderref."</td>";
                    echo "<td>".$ProductOrder->placeby."</td>";
                    echo "<td>".$ProductOrder->orderdate."</td>";
                    echo "<td>".$ProductOrder->paymentstatus."</td>";
                    echo "<td>".$ProductOrder->orderstatus."</td>";
                    echo "<td>".$ProductOrder->total."</td>";
                    echo "<td>".$ProductOrder->deliverby."</td>";
                    echo "<td>".$ProductOrder->unique_id."</td>";
                    echo "<td>".$ProductOrder->deliver_address."</td>";
                    echo "<td><button class='button green' onclick='assignvehicle(".$ProductOrder->orderid.", \"".$ProductOrder->order_cap."\" )'>Assign</button></td>";
                    echo "<td><button class='button red' onclick='cancel(".$ProductOrder->orderid.")'>Cancel</button></td>";
                    echo "<td><button class='button blue' onclick='more(\"" . $ProductOrder->unique_id . "\")'>More</button></td>";
                    echo "</tr>";
                }    
            }
            echo "</table>";
            echo "</div>";
        ?>

        <!-- On Delivery Orders -->

        <?php
        echo "<div id='OnDeliveryOrderTable' style='display:none'>";
        echo "<table style='margin:auto; margin-top: 20px; font-size:15px;'>";
        echo "<th>Order REF</th>
                <th>Placed By</th>
                <th>Order Date</th>
                <th>Payment Status</th>
                <th>Order Status</th>
                <th>Total</th>
                <th>Deliver By</th>
                <th>Unique ID</th>
                <th>Deliver Address</th>
                <th>Complete Order</th>
                <th>Cancel Order</th>
                <th>More Details</th>
            </tr>";

            foreach($productorder as $ProductOrder){ 

                if($ProductOrder->orderstatus == "ondelivery" && ($ProductOrder->paymentstatus == "paid" || $ProductOrder->paymentstatus == "advanced") && $ProductOrder->orderdate == date('Y-m-d')) {

                echo "<tr>";
                echo "<td>".$ProductOrder->orderref."</td>";
                echo "<td>".$ProductOrder->placeby."</td>";
                echo "<td>".$ProductOrder->orderdate."</td>";
                echo "<td>".$ProductOrder->paymentstatus."</td>";
                echo "<td>".$ProductOrder->orderstatus."</td>";
                echo "<td>".$ProductOrder->total."</td>";
                echo "<td>".$ProductOrder->deliverby."</td>";
                echo "<td>".$ProductOrder->unique_id."</td>";
                echo "<td>".$ProductOrder->deliver_address."</td>";
                echo "<td><button class='button green' onclick='completed(".$ProductOrder->orderid.")'>Complete</button></td>";
                echo "<td><button class='button red' onclick='cancel(".$ProductOrder->orderref.")'>Cancel</button></td>";
                echo "<td><button class='button blue' onclick='more(\"" . $ProductOrder->unique_id . "\")'>More</button></td>";
                echo "</tr>";
            }    
        }
        echo "</table>";
        echo "</div>";
        ?>

        <!-- Completed Orders -->

        <?php
        echo "<div id='CompletedOrderTable' style='display:none'>";
        echo "<table style='margin:auto; margin-top: 20px; font-size:15px;'>";
        echo "<th>Order REF</th>
                <th>Placed By</th>
                <th>Order Date</th>
                <th>Payment Status</th>
                <th>Order Status</th>
                <th>Total</th>
                <th>Deliver By</th>
                <th>Unique ID</th>
                <th>Deliver Address</th>
                <th>More Details</th>
            </tr>";

            foreach($productorder as $ProductOrder) {
            if ($ProductOrder->orderstatus == "finished" && $ProductOrder->paymentstatus == "paid" ){

                echo "<tr>";
                echo "<td>".$ProductOrder->orderref."</td>";
                echo "<td>".$ProductOrder->placeby."</td>";
                echo "<td>".$ProductOrder->orderdate."</td>";
                echo "<td>".$ProductOrder->paymentstatus."</td>";
                echo "<td>".$ProductOrder->orderstatus."</td>";
                echo "<td>".$ProductOrder->total."</td>";
                echo "<td>".$ProductOrder->deliverby."</td>";
                echo "<td>".$ProductOrder->unique_id."</td>";
                echo "<td>".$ProductOrder->deliver_address."</td>";
                echo "<td><button class='button blue' onclick='more(\"" . $ProductOrder->unique_id . "\")'>More</button></td>";
                echo "</tr>";
            }
        }
        echo "</table>";
        echo "</div>";
        ?>

        <!-- Cancled Orders -->

        <?php
        echo "<div id='CancledOrderTable' style='display:none'>";
        echo "<table style='margin:auto; margin-top: 20px; font-size:15px;'>";
        echo "<th>Order REF</th>
                <th>Placed By</th>
                <th>Order Date</th>
                <th>Payment Status</th>
                <th>Order Status</th>
                <th>Total</th>
                <th>Deliver By</th>
                <th>Unique ID</th>
                <th>Deliver Address</th>
                <th>More Details</th>
            </tr>";

            foreach($productorder as $ProductOrder) {
            if ($ProductOrder->orderstatus == "cancled"){

                echo "<tr>";
                echo "<td>".$ProductOrder->orderref."</td>";
                echo "<td>".$ProductOrder->placeby."</td>";
                echo "<td>".$ProductOrder->orderdate."</td>";
                echo "<td>".$ProductOrder->paymentstatus."</td>";
                echo "<td>".$ProductOrder->orderstatus."</td>";
                echo "<td>".$ProductOrder->total."</td>";
                echo "<td>".$ProductOrder->deliverby."</td>";
                echo "<td>".$ProductOrder->unique_id."</td>";
                echo "<td>".$ProductOrder->deliver_address."</td>";
                echo "<td><button class='button blue' onclick='more(\"" . $ProductOrder->unique_id . "\")'>More</button></td>";
                echo "</tr>";
            }
        }
        echo "</table>";
        echo "</div>";
        ?>
    </section>

    <script>
    var BASE_URL = "<?php echo BASE_URL; ?>";

    document.addEventListener('DOMContentLoaded', function () {

            console.log('DOMContentLoaded');
            var activeLink = sessionStorage.getItem('activeLink');
            console.log(activeLink);
            if (activeLink != "showpendingOrdersTable(this)" || activeLink != "showCompletedOrderTable(this)" || activeLink != "showDeliverOrderTable(this)" || activeLink != "showOnDeliverOrderTable" || activeLink != "showPickupOrderTable" || activeLink != "showCancledOrdersTable(this)" || activeLink == null){
                var homeLink = document.getElementById('home');
                if (homeLink) {
                    homeLink.click();
                }
            } else {
                var linkElement = document.querySelector('a[onclick="' + activeLink + '"]');
                if (linkElement) {
                    linkElement.classList.add('active');

                    var functionName = activeLink.match(/([a-zA-Z]+)\(/)[1];

                    if (typeof window[functionName] === 'function') {
                        window[functionName](linkElement);
                    }
                }
            }
        });

    function changeActiveLink(link){
        var links = document.querySelectorAll("body div ul li a");
        links.forEach(function (el){
            el.classList.remove('active');
        });

        link.classList.add('active');

        sessionStorage.setItem('activeLink', link.getAttribute('onclick'));
    }

    function process(orderid, deliverystatus) {
        if(deliverystatus=="pickup"){
            sessionStorage.setItem('activeLink', 'showPickupOrderTable(this)');
        }
        else if(deliverystatus=="delivery"){
            sessionStorage.setItem('activeLink', 'showDeliveryOrderTable(this)');
        }
        var url =  BASE_URL + "pmcontrols/processOrderOutlet/" + orderid + "/" + deliverystatus;
        window.location.href = url;
    }

    function cancel(orderid) {
        var url = BASE_URL + "pmcontrols/cancelOrderOutlet/" + orderid;
        window.location.href = url;
    }

    function more(unique_id) {
        var url = BASE_URL + "OrderControls/moreDetails/" + unique_id;
        window.location.href = url;
    }
 
    function assignvehicle(orderid){ //, capacity
        sessionStorage.setItem('activeLink', 'showDeliveryOrderTable(this)');
        var url = BASE_URL + "pmcontrols/assignVehicleViewOutlet/" + orderid; // + "/" + capacity
        window.location.href = url;
    }

    function completed(orderid){
        sessionStorage.setItem('activeLink', 'showCompletedOrderTable(this)')
        var url = BASE_URL + "pmcontrols/completeOrderOutlet/" + orderid;
        window.location.href = url;
    }

    function showPendingOrderTable(link){
        changeActiveLink(link);
        document.getElementById("PendingOrdersTable").style.display = "block";
        document.getElementById("PickupOrderTable").style.display = "none";
        document.getElementById("DeliveryOrderTable").style.display = "none";
        document.getElementById("OnDeliveryOrderTable").style.display = "none";
        document.getElementById("CompletedOrderTable").style.display = "none";
        document.getElementById("CancledOrderTable").style.display = "none";
    }

    function showPickupOrderTable(link){
        changeActiveLink(link);
        document.getElementById("PendingOrdersTable").style.display = "none";
        document.getElementById("PickupOrderTable").style.display = "block";
        document.getElementById("DeliveryOrderTable").style.display = "none";
        document.getElementById("OnDeliveryOrderTable").style.display = "none";
        document.getElementById("CompletedOrderTable").style.display = "none";
        document.getElementById("CancledOrderTable").style.display = "none";
    }

    function showDeliveryOrderTable(link){
        changeActiveLink(link);
        document.getElementById("PendingOrdersTable").style.display = "none";
        document.getElementById("PickupOrderTable").style.display = "none";
        document.getElementById("DeliveryOrderTable").style.display = "block";
        document.getElementById("OnDeliveryOrderTable").style.display = "none";
        document.getElementById("CompletedOrderTable").style.display = "none";
        document.getElementById("CancledOrderTable").style.display = "none";
    }

    function showOnDeliveryOrderTable(link){
        changeActiveLink(link);
        document.getElementById("PendingOrdersTable").style.display = "none";
        document.getElementById("PickupOrderTable").style.display = "none";
        document.getElementById("DeliveryOrderTable").style.display = "none";
        document.getElementById("OnDeliveryOrderTable").style.display = "block";
        document.getElementById("CompletedOrderTable").style.display = "none";
        document.getElementById("CancledOrderTable").style.display = "none";
    }

    function showCompletedOrderTable(link){
        changeActiveLink(link);
        document.getElementById("PendingOrdersTable").style.display = "none";
        document.getElementById("PickupOrderTable").style.display = "none";
        document.getElementById("DeliveryOrderTable").style.display = "none";
        document.getElementById("OnDeliveryOrderTable").style.display = "none";
        document.getElementById("CompletedOrderTable").style.display = "block";
        document.getElementById("CancledOrderTable").style.display = "none";
    }

    function showCancledOrderTable(link){
        changeActiveLink(link);
        document.getElementById("PendingOrdersTable").style.display = "none";
        document.getElementById("PickupOrderTable").style.display = "none";
        document.getElementById("DeliveryOrderTable").style.display = "none";
        document.getElementById("OnDeliveryOrderTable").style.display = "none";
        document.getElementById("CompletedOrderTable").style.display = "none";
        document.getElementById("CancledOrderTable").style.display = "block";
    }

    function clearSearch(){
        window.location.href = BASE_URL + "pmcontrols/outletOrdersView";
    }

    </script>
</body>
</html>
