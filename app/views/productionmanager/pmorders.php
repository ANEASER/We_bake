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
    <title>Production Orders</title>
</head>
<body>
    <?php include 'pmnavbar.php'; ?>
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
            </ul>
        </ul>
    </div>
    <div >
        <table style="margin:auto; margin-top: 20px; font-size:15px;">
            <tr>
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
            </tr>
            
            <?php foreach ($productorder as $ProductOrder): ?>
                <?php if ($ProductOrder->orderstatus == "pending"): ?>
                    <tr>
                        <td><?php echo $ProductOrder->orderid; ?></td>
                        <td><?php echo $ProductOrder->placeby; ?></td>
                        <td><?php echo $ProductOrder->orderdate; ?></td>
                        <td><?php echo $ProductOrder->paymentstatus; ?></td>
                        <td><?php echo $ProductOrder->orderstatus; ?></td>
                        <td><?php echo $ProductOrder->total; ?></td>
                        <td><?php echo $ProductOrder->deliveryby; ?></td>
                        <td><?php echo $ProductOrder->unique_id; ?></td>
                        <td><?php echo $ProductOrder->deliver_address; ?></td>
                        <td><button class="greenbutton" onclick="process(<?php echo $ProductOrder->orderid . ", '" . $ProductOrder->deliverstatus . "'"; ?>)">Process</button></td>
                        <td><button class="redbutton" onclick="cancel(<?php echo $ProductOrder->orderid; ?>)">Cancel</button></td>
                        <td><button class="bluebutton" onclick="more(<?php echo $ProductOrder->unique_id; ?>)">More</button></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </table>
    </div>
    <script>
        function process(orderid, deliverystatus) {
            window.location.href = BASE_URL + "pmcontrols/processOrder/" + orderid + "/" + deliverystatus;
        }

        function cancel(orderid) {
            window.location.href = BASE_URL + "pmcontrols/cancelOrder/" + orderid;
        }

        function more(unique_id) {
            var url = BASE_URL + "OrderControls/moreDetails/" + unique_id;
            window.location.href = url;
        }
    </script>
</body>
</html>
