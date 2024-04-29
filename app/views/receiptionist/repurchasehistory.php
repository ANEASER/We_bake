<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/tables.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/cart.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
   <title>Purchase History</title>
</head>
  
    

<body>
    <?php
        include "recnavbar.php";
    ?>
    
    <br>
    <div style="display: flex; flex-direction:row; justify-content:space-between; margin-bottom:2%">
                <form method="GET" action="<?php echo BASE_URL; ?>RecieptionControls/searchOrders" style="display: flex; flex-direction:row;">
                    <?php
                        if(isset($_GET['search'])) {
                            echo '<input type="text" id="search" name="search" placeholder="Enter The Order Ref" value="' . $_GET['search'] . '" class="searchbox">';
                            echo '<input class="searchbutton" style="margin-right:1%" type="submit" value="Search">';
                            echo '<button class="searchbutton" onclick="clearSearch(); return false;">Clear Search</button>';
                        } else {
                            echo '<input type="text" id="search" name="search" placeholder="Enter The Order Ref" class="searchbox">';
                            echo '<input class="searchbutton" type="submit" value="Search">';
                    }
                    ?>
                </form>
    </div>
        
        <section style="display:flex;justify-content:space-around; padding-top:4%; width:100%">
        <?php
            if($orders == null){
                echo "<h1>No Orders Found</h1>";
            } else {
            
                echo "<table>";
                echo "<tr>
                    <th>Order Ref</th>
                    <th>Placed By</th>
                    <th>Order Date</th>
                    <th>Payment Status</th>
                    <th>Delivery Status</th>
                    <th>Order Status</th>
                    <th>Total(Rs)</th>
                    <th>Deliver Address</th>
                
                    <th>More</th>

                </tr>";

                foreach($orders as $order){ 
                        echo "<tr>";
                        echo "<td>".$order->orderref."</td>";
                        echo "<td>".$order->placeby."</td>";
                        echo "<td>".$order->orderdate."</td>";
                        echo "<td>".$order->paymentstatus."</td>";
                        echo "<td>".$order->deliverystatus."</td>";
                        echo "<td>".$order->orderstatus."</td>";
                        echo "<td>".$order->total.".00</td>";
                        echo "<td>".$order->deliver_address."</td>";
                        
                        echo "<td><button class='bluebutton' onclick='more(\"" . $order->unique_id . "\")'>More</button></td>";

                        echo "</tr>";
                    }       
                
                echo "</table>";
            }
        ?>
        </section>
    </div>

    <script>
        var BASE_URL = "<?php echo BASE_URL; ?>";

        function cancel(orderid){
            window.location.href = BASE_URL + "RecieptionControls/cancelOrder/" + orderid;
        }

        function more(unique_id){
            window.location.href = BASE_URL + "OrderControls/moredetails/" + unique_id;
        }

        function clearSearch(){
            window.location.href = BASE_URL + "RecieptionControls/viewhistory"; // should controller name
        }

    </script>

</body>

</html>
