<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/tables.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/cart.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/navbar.css">
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
        }
    </style>
    <title>Dashboard</title>
</head>

<body>
    <?php
        require_once('bcnavbar.php');
    ?>
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
<li style="margin-right:10px;"><a class="hover" id="home" onclick="showPendingOrders(this)">PendingOrders</a></li>
<li style="margin-right:10px;"><a class="hover" onclick="showAdvancedOrders(this)">AdvancedOrders</a></li>
<li style="margin-right:10px;"><a class="hover" onclick="showPaidOrders(this)">PaidOrders</a></li>
<li style="margin-right:10px;"><a class="hover" onclick="showCompletedOrders(this)">CompletedOrders</a></li>
<li style="margin-right:10px;"><a class="hover" onclick="showCancledOrders(this)">CancledOrders</a></li>
</ul>
</ul>
</div>

<section style="display:flex;justify-content:space-around; width:100%">

<!-- Pending Orders -->

<?php
echo "<div id='PendingOrdersTable'>";
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
        <th>More Details</th>
    </tr>";
    
    foreach($productorder as $ProductOrder){
        if ($ProductOrder->orderstatus == "pending" && $ProductOrder->paymentstatus=="pending"){
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
            echo "<td><button class='button yellow' onclick='update(".$ProductOrder->orderid.", \"".$ProductOrder->paymentstatus."\")'>Update</button></td>";
            echo "<td><button class='button blue' onclick='more(\"" . $ProductOrder->unique_id . "\")'>More</button></td>";
            echo "</tr>";
        }
    }
echo "</table>";
echo "</div>"
?>

<!-- Advanced Orders -->

<?php
echo "<div id='AdvancedOrdersTable'>";
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
        <th>More Details</th>
    </tr>";

    foreach($productorder as $ProductOrder){
        if($ProductOrder->paymentstatus=="advanced"){
            echo "<td>".$ProductOrder->orderref."</td>";
            echo "<td>".$ProductOrder->placeby."</td>";
            echo "<td>".$ProductOrder->orderdate."</td>";
            echo "<td>".$ProductOrder->paymentstatus."</td>";
            echo "<td>".$ProductOrder->orderstatus."</td>";
            echo "<td>".$ProductOrder->total."</td>";
            echo "<td>".$ProductOrder->deliverby."</td>";
            echo "<td>".$ProductOrder->unique_id."</td>";
            echo "<td>".$ProductOrder->deliver_address."</td>";
            echo "<td><button class='button yellow' onclick='update(".$ProductOrder->orderid.", \"".$ProductOrder->paymentstatus."\")'>Update</button></td>";
            echo "<td><button class='button blue' onclick='more(\"" . $ProductOrder->unique_id . "\")'>More</button></td>";
            echo "</tr>";
        }
    }
    echo "</table>";
echo "</div>"
?>

<!-- Paid Orders -->

<?php
echo "<div id='PaidOrdersTable'>";
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
        <th>More Details</th>
    </tr>";

    foreach($productorder as $ProductOrder){
        if($ProductOrder->paymentstatus=="paid"){
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
echo "</div>"
?>

<!-- Completed Orders -->

<?php
echo "<div id='CompletedOrdersTable'>";
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
        <th>More Details</th>
    </tr>";
    foreach($productorder as $ProductOrder){
        if($ProductOrder->orderstatus=="finished"){
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
echo "</div>"
?>

<!-- Cancled Orders -->

<?php
echo "<div id='CancledOrdersTable'>";
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
        <th>More Details</th>
    </tr>";
    foreach($productorder as $ProductOrder){
        if($ProductOrder->orderstatus=="cancled"){
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
echo "</div>"
?>
</section>

<script>

    var BASE_URL = "<?php echo BASE_URL;?>";

    document.addEventListener('DOMContentLoaded', function(){ 

        var firstLink = document.querySelector('body div ul li a');
        if(firstLink){
            changeActiveLink(firstLink);
            showPendingOrders(firstLink);
        }
    });

    function changeActiveLink(link){
        var links = document.querySelectorAll('body div ul li a');
        links.forEach(function (el){
            el.classList.remove('active');
            
        });

        link.classList.add('active');
    }

    function update(orderid, paymentstatus){
        window.location.href = BASE_URL + "BillingControls/updateOrder/"+orderid+"/"+paymentstatus;
    }

    function more(unique_id){
        window.location.href = BASE_URL + "OrderControls/moredetails/"+unique_id;
    } 

    function clearSearch(){
        window.location.href = BASE_URL + "BillingControls/clearSearch";
    }



    function showPendingOrders(link){
        changeActiveLink(link);
        document.getElementById('PendingOrdersTable').style.display = 'block';
        document.getElementById('AdvancedOrdersTable').style.display = 'none';
        document.getElementById('PaidOrdersTable').style.display = 'none';
        document.getElementById('CompletedOrdersTable').style.display = 'none';
        document.getElementById('CancledOrdersTable').style.display = 'none';
        document.getElementById('searchedOrdersTable').style.display = 'none';
    }

    function showAdvancedOrders(link){
        changeActiveLink(link);
        document.getElementById('PendingOrdersTable').style.display= 'none';
        document.getElementById('AdvancedOrdersTable').style.display = 'block';
        document.getElementById('PaidOrdersTable').style.display = 'none';
        document.getElementById('CompletedOrdersTable').style.display = 'none';
        document.getElementById('CancledOrdersTable').style.display = 'none';
        document.getElementById('searchedOrdersTable').style.display = 'none';
    }

    function showPaidOrders(link){
        changeActiveLink(link);
        document.getElementById('PendingOrdersTable').style.display = 'none';
        document.getElementById('AdvancedOrdersTable').style.display = 'none';
        document.getElementById('PaidOrdersTable').style.display = 'block';
        document.getElementById('CompletedOrdersTable').style.display = 'none';
        document.getElementById('CancledOrdersTable').style.display = 'none';
        document.getElementById('searchedOrdersTable').style.display = 'none';
    }

    function showCompletedOrders(link){
        changeActiveLink(link);
        document.getElementById('PendingOrdersTable').style.display = 'none';
        document.getElementById('AdvancedOrdersTable').style.display = 'none';
        document.getElementById('PaidOrdersTable').style.display = 'none';
        document.getElementById('CompletedOrdersTable').style.display = 'block';
        document.getElementById('CancledOrdersTable').style.display = 'none';
        document.getElementById('searchedOrdersTable').style.display = 'none';
    }

    function showCancledOrders(link){
        changeActiveLink(link);
        document.getElementById('PendingOrdersTable').style.display = 'none';
        document.getElementById('AdvancedOrdersTable').style.display = 'none';
        document.getElementById('PaidOrdersTable').style.display = 'none';
        document.getElementById('CompletedOrdersTable').style.display = 'none';
        document.getElementById('CancledOrdersTable').style.display = 'block';
        document.getElementById('searchedOrdersTable').style.display = 'none';   
    }

</script>
</body>
</html>