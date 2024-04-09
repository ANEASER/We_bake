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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>Production Orders</title>

</head>
<body  >
    <?php
        include 'pmnavbar.php';
    ?>
    <div class="searchpanel">
        <form method="GET" style="display:flex; flex-direction:row;">
       <input type="text" id="search" name="search" placeholder="Enter Order ID or Place BY" class="searchbox">
        <input type="submit" value="Search" class="greenbutton">
                        </form>
        <ul style="display: flex;margin-left: 70%;">
                    
                <ul style="display: flex; padding: 0; list-style: none; margin: 0;">
                    <li style="margin-right: 10px;"><a id="home" onclick="showpendingOrdersTable(this)">PendingOrders</a></li>
                    <li style="margin-right: 10px;"><a onclick="showPickupOrderTable(this)" >PickupOrders</a></li>
                    <li style="margin-right: 10px;"><a onclick="showDeliverOrderTable(this)" >ToDeliverOrders</a></li>
                    <li style="margin-right: 10px;"><a onclick="showOnDeliverOrderTable(this)" >OnDeliveryOrders</a></li>
                    <li style="margin-right: 10px;"><a onclick="showCompletedOrderTable(this)" >CompletedOrders</a></li>
                </ul></ul>
</div>
<div id='pendingOrdersTable'>
            <table style="margin:auto; margin-top: 30px;">
            <tr>
                <th style="background-color: antiquewhite; border: 1px solid white;">Order REF</th>
                <th style="background-color: antiquewhite; border: 1px solid white;">Placed By</th>
                <th style="background-color: antiquewhite; border: 1px solid white;">Order Date</th>
                <th style="background-color: antiquewhite; border: 1px solid white;">Payment Status</th>
                <th style="background-color: antiquewhite; border: 1px solid white;">Order Status</th>
                <th style="background-color: antiquewhite; border: 1px solid white;">Total</th>
                <th style="background-color: antiquewhite; border: 1px solid white;">Deliver By</th>
                <th style="background-color: antiquewhite; border: 1px solid white;">Unique ID</th>
                <th style="background-color: antiquewhite; border: 1px solid white;">Deliver Address</th>
                <th style="background-color: antiquewhite; border: 1px solid white;">Update</th>
                <th style="background-color: antiquewhite; border: 1px solid white;">Cancel</th>
                <th style="background-color: antiquewhite; border: 1px solid white;">More</th>
            </tr>
</table>
</div>          
    


</body>
</html>
