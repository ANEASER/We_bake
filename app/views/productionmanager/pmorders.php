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
        .yellow{
            background-color: #f1c40f;
            margin-left: 10px;
        }
        .pagination-container {
            text-align: center;
            margin-top: 10px; 
            max-width: 620px;
            margin-left: 30%;
        }

        .pagination a {
            display: inline-block;
            padding: 8px 16px;
            margin: 0 4px;
            color: rgb(95, 37, 37);
            text-decoration: none;
            border-radius: 4px;
        }
        
    </style>
    <title>Customer Orders</title>
</head>
<body>

    <?php include 'pmnavbar.php'; 
    
    if (isset($error)) {
        echo '<script>
            document.addEventListener("DOMContentLoaded", function () {
                const showAlert = async () => {
                    const SwalwithButton = Swal.mixin({
                        customClass: {
                            confirmButton: "greenbutton",
                        },
                        buttonsStyling: false
                    });
    
                    if (typeof Swal !== "undefined") {
                        await SwalwithButton.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "' . $error . '",
                            confirmButtonText: "OK",
                        });
                        window.location.href = "' . BASE_URL . 'pmcontrols/index";
                    } else {
                        alert("' . $error . '");
                    }
                };
    
                // Call the async function to show the alert
                showAlert();
            });
        </script>';
    }
    ?>

    <div class="searchpanel">
        <form method="GET" action="<?php echo BASE_URL;?>OrderControls/searchOrders" class="search" style="display:flex; flex-direction:row;">
        <?php
        if(isset($_GET['search'])){
            echo '<input type="text" id="search" name="search" placeholder="Enter Order Ref or Place BY" value="'.$_GET['search'].'" class="searchbox">';
            echo '<input type="submit" value="Search" class="button green">';
            echo '<button class="button green" onclick="clearSearch(); return false;">Clear Search</button>';
        }
        else{
            echo '<input type="text" id="search" name="search" placeholder="Enter Order ID or Place BY" value="" class="searchbox">';
            echo '<input type="submit" value="Search" class="button green">';
        }
        ?>
        </form>
        
        <ul style="display: flex;margin-left: 20%;">
            <ul style="display: flex; padding: 0; list-style: none; margin: 0;">
                <li style="margin-right: 10px;"><a class="hover"id="home" onclick="showPendingOrderTable(this)">PendingOrders</a></li>
                <li style="margin-right: 10px;"><a class="hover" onclick="showProcessingOrderTable(this)">ProcessingOrders</a></li>
                <li style="margin-right: 10px;"><a class="hover" onclick="showDeliveryOrderTable(this)">ToDeliverOrders</a></li>
                <li style="margin-right: 10px;"><a class="hover" onclick="showPickupOrderTable(this)">PickupOrders</a></li>
                <li style="margin-right: 10px;"><a class="hover" onclick="showOnDeliveryOrderTable(this)">OnDeliveryOrders</a></li>
                <li style="margin-right: 10px;"><a class="hover" onclick="showCompletedOrderTable(this)">CompletedOrders</a></li>
                <li style="margin-right: 10px;"><a class="hover" onclick="showCancledOrderTable(this)">CancledOrders</a></li>
            </ul>
        </ul>
    </div>

    <section style="display:flex;justify-content:space-around; width:100%">
        
        <!-- Pending Orders -->
        
        <?php
        
       /* $itemsPerPage = 10;
        $totalorders = count($productorder);
        $totalPages = ceil($totalorders/ $itemsPerPage);
        $currentPage = isset($_GET['page']) ? max(1, min((int)$_GET['page'], $totalPages)) : 1;

        $startIndex = ($currentPage - 1) * $itemsPerPage;
        $endIndex = min($startIndex + $itemsPerPage, $totalorders); */

        echo "<div id='PendingOrdersTable'>"; 
        echo "<table style='margin:auto; margin-top: 20px; font-size:15px;'>";
        echo "<tr>
                <th>Order REF</th>
                <th>Placed By</th>
                <th>Order Date</th>
                <th>Payment Status</th>
                <th>Order Status</th>
                <th>Total</th>
                <th>Order Capacity(No.of Containers)</th>
                <th>Deliver Address</th>
                <th>Update Order</th>
                <th>Cancel Order</th>
                <th>More Details</th>
            </tr>";

        foreach ($productorder as $ProductOrder) { //array_slice($productorder, $startIndex, $itemsPerPage)

            if ($ProductOrder->orderstatus == "pending" && $ProductOrder->orderdate >= date('Y-m-d')) {
                echo "<tr>";
                echo "<td>" . $ProductOrder->orderref . "</td>";
                echo "<td>" . $ProductOrder->placeby . "</td>";
                echo "<td>" . $ProductOrder->orderdate . "</td>";
                echo "<td>" . $ProductOrder->paymentstatus . "</td>";
                echo "<td>" . $ProductOrder->orderstatus . "</td>";
                echo "<td>" . $ProductOrder->total . "</td>";
                echo "<td>" . $ProductOrder->order_cap . "</td>";
                echo "<td>" . $ProductOrder->deliver_address . "</td>";
                if ($ProductOrder->paymentstatus === "paid" || $ProductOrder->paymentstatus === "advanced") {
                    echo "<td><button class='button green' onclick='process(" . $ProductOrder->orderid . ")'>Process</button></td>";
                } else {
                    echo "<td><button class='button green' onclick='validateProcess()'>Process</button></td>";
                }
                echo "<td><button class='button red' onclick='cancel(" . $ProductOrder->orderid . ")'>Cancel</button></td>";
                echo "<td><button class='button blue' onclick='more(\"" . $ProductOrder->unique_id . "\")'>More</button></td>";
                echo "</tr>";
            }
        }
        echo "</table>";
        /*echo '<br>';
        echo '<br>';

        echo '<div class="pagination-container">';
        echo '<div class="pagination">';

        if ($currentPage > 1) {
            echo '<a href="' . BASE_URL . 'pmcontrols/index?page=' . ($currentPage - 1) . '">Previous</a>';
        }

        echo '<span> Page ' . $currentPage . ' of ' . $totalPages . '</span>';

        if ($currentPage < $totalPages) {
            echo '<a href="' . BASE_URL . 'pmcontrols/index?page=' . ($currentPage + 1) . '">Next</a>';
        }

        echo '</div>';
        echo '</div>';
        
        <?php 
        alert("Order Processed"); 
        ?>*/

        echo "</div>";
    ?>



    <!-- Processing Orders -->
    <?php
            echo "<div id='ProcessingOrdersTable'>";
            echo "<table style='margin:auto; margin-top: 20px; font-size:15px;'>";
            echo "<tr>
                    <th>Order REF</th>
                    <th>Placed By</th>
                    <th>Order Date</th>
                    <th>Payment Status</th>
                    <th>Order Status</th>
                    <th>Total</th>
                    <th>Order Capacity
                    (No.of Containers)</th>
                    <th>Deliver Address</th>
                    <th>Update Order</th>
                    <th>Cancel Order</th>
                    <th>More Details</th>
                </tr>";
                
                foreach ($productorder as $ProductOrder){
                    if ($ProductOrder->orderstatus == "processing" && ($ProductOrder->paymentstatus == "paid" || $ProductOrder->paymentstatus == "advanced") ){ //&& $ProductOrder->orderdate == date("Y-m-d", strtotime('+1 day')) 
                        echo "<tr>";
                        echo "<td>".$ProductOrder->orderref."</td>";
                        echo "<td>".$ProductOrder->placeby."</td>";
                        echo "<td>".$ProductOrder->orderdate."</td>";
                        echo "<td>".$ProductOrder->paymentstatus."</td>";
                        echo "<td>".$ProductOrder->orderstatus."</td>";
                        echo "<td>".$ProductOrder->total."</td>";
                        echo "<td>".$ProductOrder->order_cap."</td>";
                        echo "<td>".$ProductOrder->deliver_address."</td>";
                        echo "<td><button class='button green' onclick='completeProduction(".$ProductOrder->orderid.", \"".$ProductOrder->deliverystatus."\")'>Production Complete</button></td>";
                        echo "<td><button class='button red' onclick='cancel(".$ProductOrder->orderid.")'>Cancel</button></td>";
                        echo "<td><button class='button blue' onclick='more(\"" . $ProductOrder->unique_id . "\")'>More</button></td>";
                        echo "</tr>";
                    }
                }
            echo "</table>";
            echo '<br>';
        echo '<br>';
            echo "</div>";
            ?>

        <!-- Pickup Orders -->

        <?php
        echo "<div id='PickupOrderTable'>";
        echo "<table style='margin:auto; margin-top: 20px; font-size:15px;'>";
        echo "<tr>
                <th>Order REF</th>
                <th>Placed By</th>
                <th>Order Date</th>
                <th>Payment Status</th>
                <th>Order Status</th>
                <th>Total</th>
                <th>Order Capacity
                    (No.of Containers)</th>
                <th>Complete Order</th>
                <th>Cancel Order</th>
                <th>More Details</th>
            </tr>";
            
            foreach ($productorder as $ProductOrder){
                if ($ProductOrder->orderstatus == "finishedproduction" && ($ProductOrder->paymentstatus == "paid" || $ProductOrder->paymentstatus == "advanced") && $ProductOrder->deliverystatus == "pickup" ) { 

                    echo "<tr>";
                    echo "<td>".$ProductOrder->orderref."</td>";
                    echo "<td>".$ProductOrder->placeby."</td>";
                    echo "<td>".$ProductOrder->orderdate."</td>";
                    echo "<td>".$ProductOrder->paymentstatus."</td>";
                    echo "<td>".$ProductOrder->orderstatus."</td>";
                    echo "<td>".$ProductOrder->total."</td>";
                    echo "<td>".$ProductOrder->order_cap."</td>";
                    echo "<td><button class='button green' onclick='completed(".$ProductOrder->orderid.")'>Complete</button></td>";
                    echo "<td><button class='button red' onclick='cancel(".$ProductOrder->orderid.")'>Cancel</button></td>";
                    echo "<td><button class='button blue' onclick='more(\"" . $ProductOrder->unique_id . "\")'>More</button></td>";
                    echo "</tr>";
                }
            }
        echo "</table>";
        echo '<br>';
        echo '<br>';
        echo "</div>";
        ?>

        <!-- Delivery Orders -->

        <?php
        echo "<div id='DeliveryOrderTable'>";
        echo "<table style='margin:auto; margin-top: 20px; font-size:15px;'>";
        echo "<th>Order REF</th>
                <th>Placed By</th>
                <th>Order Date</th>
                <th>Payment Status</th>
                <th>Order Status</th>
                <th>Total</th>
                <th>Order Capacity(No.of Containers)</th>
                <th>Deliver Address</th>
                <th>Assign Vehicle</th>
                <th>Cancel Order</th>
                <th>More Details</th>
            </tr>";

            foreach($productorder as $ProductOrder){ 

                if($ProductOrder->orderstatus == "finishedproduction" && ($ProductOrder->paymentstatus == "paid" || $ProductOrder->paymentstatus == "advanced") && ($ProductOrder->deliverystatus == "delivery") ) { //&& $ProductOrder->orderdate == date('Y-m-d', strtotime('+1 day'))

                    echo "<tr>";
                    echo "<td>".$ProductOrder->orderref."</td>";
                    echo "<td>".$ProductOrder->placeby."</td>";
                    echo "<td>".$ProductOrder->orderdate."</td>";
                    echo "<td>".$ProductOrder->paymentstatus."</td>";
                    echo "<td>".$ProductOrder->orderstatus."</td>";
                    echo "<td>".$ProductOrder->total."</td>";
                    echo "<td>".$ProductOrder->order_cap."</td>";
                    echo "<td>".$ProductOrder->deliver_address."</td>";
                    echo "<td><button class='button green' onclick='assignvehicle(".$ProductOrder->orderid.")'>Assign</button></td>"; 
                    echo "<td><button class='button red' onclick='cancel(".$ProductOrder->orderid.")'>Cancel</button></td>";
                    echo "<td><button class='button blue' onclick='more(\"" . $ProductOrder->unique_id . "\")'>More</button></td>";
                    echo "</tr>";
                }    
            }
            echo "</table>";
            echo '<br>';
        echo '<br>';
            echo "</div>";
        ?>

        <!-- On Delivery Orders -->

        <?php
        echo "<div id='OnDeliveryOrderTable'>";
        echo "<table style='margin:auto; margin-top: 20px; font-size:15px;'>";
        echo "<th>Order REF</th>
                <th>Placed By</th>
                <th>Order Date</th>
                <th>Payment Status</th>
                <th>Order Status</th>
                <th>Total</th>
                <th>Deliver By</th>
                <th>Order Capacity(No.of Containers)</th>
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
                echo "<td>".$ProductOrder->order_cap."</td>";
                echo "<td>".$ProductOrder->deliver_address."</td>";
                echo "<td><button class='button green' onclick='completed(".$ProductOrder->orderid.")'>Complete</button></td>";
                echo "<td><button class='button red' onclick='cancel(".$ProductOrder->orderref.")'>Cancel</button></td>";
                echo "<td><button class='button blue' onclick='more(\"" . $ProductOrder->unique_id . "\")'>More</button></td>";
                echo "</tr>";
            }    
        }
        echo "</table>";
        echo '<br>';
        echo '<br>';
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
                <th>Order Capacity(No.of Containers)</th>
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
                echo "<td>".$ProductOrder->order_cap."</td>";
                echo "<td>".$ProductOrder->deliver_address."</td>";
                echo "<td><button class='button blue' onclick='more(\"" . $ProductOrder->unique_id . "\")'>More</button></td>";
                echo "</tr>";
            }
        }
        echo "</table>";
        echo '<br>';
        echo '<br>';
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
                <th>Order Capacity 
                (No.of Containers)</th>
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
                echo "<td>".$ProductOrder->order_cap."</td>";
                echo "<td>".$ProductOrder->deliver_address."</td>";
                echo "<td><button class='button blue' onclick='more(\"" . $ProductOrder->unique_id . "\")'>More</button></td>";
                echo "</tr>";
            }
        }
        echo "</table>";
        echo '<br>';
        echo '<br>';
        echo "</div>";
        ?>
    </section>

    <script>
    var BASE_URL = "<?php echo BASE_URL; ?>";

    document.addEventListener('DOMContentLoaded', function () {

            console.log('DOMContentLoaded');
            var activeLink = sessionStorage.getItem('activeLink');
            console.log(activeLink);
            if (activeLink != "showpendingOrdersTable(this)" || activeLink != "showProcessingOrderTable(this)" || activeLink != "showCompletedOrderTable(this)" || activeLink != "showDeliverOrderTable(this)" || activeLink != "showOnDeliverOrderTable" || activeLink != "showPickupOrderTable" || activeLink != "showCancledOrdersTable(this)" || activeLink == null){
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

    function process(orderid){
        const SwalwithButton = Swal.mixin({
            customClass: {
                confirmButton: "button yellow",
                cancelButton: "button yellow"
            },
            buttonsStyling: false
            });

            SwalwithButton.fire({
                text: "Are you sure you want to process this order?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes",
                cancelButtonText: "No",
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Order Processed Successfully',
                        text: 'The order has been successfully processed.',
                        confirmButtonText: 'OK'
                    }).then(() => {
                    var url = BASE_URL + "pmcontrols/processOrder/" + orderid;
                    window.location.href = url;
                    });
                }
            });
    } 

    function completeProduction(orderid, deliverystatus) {
        if(deliverystatus=="pickup"){
            sessionStorage.setItem('activeLink', 'showPickupOrderTable(this)');
        }
        else if(deliverystatus=="delivery"){
            sessionStorage.setItem('activeLink', 'showDeliveryOrderTable(this)');
        }
        var url =  BASE_URL + "pmcontrols/completeProductionOrder/" + orderid + "/" + deliverystatus;
        window.location.href = url;
    }

    function cancel(orderid) {
        const SwalwithButton = Swal.mixin({
            customClass: {
                confirmButton: "button yellow",
                cancelButton: "button yellow"
            },
            buttonsStyling: false
            });

            SwalwithButton.fire({
                text: "Are you sure you want to cancel this order?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes",
                cancelButtonText: "No",
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Order Canceled Successfully',
                        text: 'The order has been successfully canceled.',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        var url = BASE_URL + "pmcontrols/cancelOrder/" + orderid;
                        window.location.href = url;
                    });
                }
            });
    }


    function more(unique_id) {
        var url = BASE_URL + "OrderControls/moreDetails/" + unique_id;
        window.location.href = url;
    }

    function assignvehicle(orderid){ //, capacity
        sessionStorage.setItem('activeLink', 'showDeliveryOrderTable(this)');
        var url = BASE_URL + "pmcontrols/assignVehicleView/" + orderid ; //+  "/" + capacity
        window.location.href = url;
    }

    function completed(orderid){
        const SwalwithButton = Swal.mixin({
            customClass: {
                confirmButton: "button yellow",
                cancelButton: "button yellow"
            },
            buttonsStyling: false
            });

            SwalwithButton.fire({
                text: "Are you sure you want to complete this order?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes",
                cancelButtonText: "No",
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Order Completed Successfully',
                        text: 'The order has been successfully Completed.',
                        confirmButtonText: 'OK'
                    }).then(() => {
                    sessionStorage.setItem('activeLink', 'showCompletedOrderTable(this)')
                    var url = BASE_URL + "pmcontrols/completeOrder/" + orderid;
                    window.location.href = url;
                    });
                }
            });  
    }

    function showPendingOrderTable(link){
        changeActiveLink(link);
        document.getElementById("PendingOrdersTable").style.display = "block";
        document.getElementById("ProcessingOrdersTable").style.display = "none";
        document.getElementById("DeliveryOrderTable").style.display = "none";
        document.getElementById("PickupOrderTable").style.display = "none";
        document.getElementById("OnDeliveryOrderTable").style.display = "none";
        document.getElementById("CompletedOrderTable").style.display = "none";
        document.getElementById("CancledOrderTable").style.display = "none";
    }

    function showProcessingOrderTable(link){
        changeActiveLink(link);
        document.getElementById("PendingOrdersTable").style.display = "none";
        document.getElementById("ProcessingOrdersTable").style.display = "block";
        document.getElementById("DeliveryOrderTable").style.display = "none";
        document.getElementById("PickupOrderTable").style.display = "none";
        document.getElementById("OnDeliveryOrderTable").style.display = "none";
        document.getElementById("CompletedOrderTable").style.display = "none";
        document.getElementById("CancledOrderTable").style.display = "none";
    }

    function showPickupOrderTable(link){
        changeActiveLink(link);
        document.getElementById("PendingOrdersTable").style.display = "none";
        document.getElementById("ProcessingOrdersTable").style.display = "none";
        document.getElementById("DeliveryOrderTable").style.display = "none";
        document.getElementById("PickupOrderTable").style.display = "block";
        document.getElementById("OnDeliveryOrderTable").style.display = "none";
        document.getElementById("CompletedOrderTable").style.display = "none";
        document.getElementById("CancledOrderTable").style.display = "none";
    }

    function showDeliveryOrderTable(link){
        changeActiveLink(link);
        document.getElementById("PendingOrdersTable").style.display = "none";
        document.getElementById("ProcessingOrdersTable").style.display = "none";
        document.getElementById("DeliveryOrderTable").style.display = "block";
        document.getElementById("OnDeliveryOrderTable").style.display = "none";
        document.getElementById("PickupOrderTable").style.display = "none";
        document.getElementById("CompletedOrderTable").style.display = "none";
        document.getElementById("CancledOrderTable").style.display = "none";
    }

    function showOnDeliveryOrderTable(link){
        changeActiveLink(link);
        document.getElementById("PendingOrdersTable").style.display = "none";
        document.getElementById("ProcessingOrdersTable").style.display = "none";
        document.getElementById("DeliveryOrderTable").style.display = "none";
        document.getElementById("PickupOrderTable").style.display = "none";
        document.getElementById("OnDeliveryOrderTable").style.display = "block";
        document.getElementById("CompletedOrderTable").style.display = "none";
        document.getElementById("CancledOrderTable").style.display = "none";
    }

    function showCompletedOrderTable(link){
        changeActiveLink(link);
        document.getElementById("PendingOrdersTable").style.display = "none";
        document.getElementById("ProcessingOrdersTable").style.display = "none";
        document.getElementById("DeliveryOrderTable").style.display = "none";
        document.getElementById("PickupOrderTable").style.display = "none";
        document.getElementById("OnDeliveryOrderTable").style.display = "none";
        document.getElementById("CompletedOrderTable").style.display = "block";
        document.getElementById("CancledOrderTable").style.display = "none";
    }

    function showCancledOrderTable(link){
        changeActiveLink(link);
        document.getElementById("PendingOrdersTable").style.display = "none";
        document.getElementById("ProcessingOrdersTable").style.display = "none";
        document.getElementById("DeliveryOrderTable").style.display = "none";
        document.getElementById("PickupOrderTable").style.display = "none";
        document.getElementById("OnDeliveryOrderTable").style.display = "none";
        document.getElementById("CompletedOrderTable").style.display = "none";
        document.getElementById("CancledOrderTable").style.display = "block";
    }

    function clearSearch(){
        window.location.href = BASE_URL + "pmcontrols/index";
    }

   /* 
    function alert($message) { 
        alert('$message'); 
    } 
    */
    function validateProcess(){
            Swal.fire({
                icon: 'error',
                title: 'Order Cannot Be Processed',
                text: 'No advance or full payment received',
                confirmButtonText: 'OK'
            });
        }
    </script>
</body>
</html>


