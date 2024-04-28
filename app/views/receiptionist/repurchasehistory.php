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
    <style>

        /* Style the page btn */
        .pagination-container {
            text-align: center;
            margin-top: 10px; /* Adjust as needed */
        }

        .pagination a {
            display: inline-block;
            padding: 8px 16px;
            margin: 0 4px;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        </style>
    
    <br>
    <section style="padding: 2%;">
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
            <section style="display:flex;justify-content:space-around; padding: 2% 10% 0% 10%; width:100%;flex-direction:column;">
                <?php
                    if($orders != null){
                        $itemsPerPage = 5;
                        $totalOrders = count($orders);
                        $totalPages = ceil($totalOrders / $itemsPerPage);

                        // Assuming you have a page parameter in your URL, e.g., ?page=2
                        $currentPage = isset($_GET['page']) ? max(1, min((int)$_GET['page'], $totalPages)) : 1;

                        $startIndex = ($currentPage - 1) * $itemsPerPage;
                        $endIndex = min($startIndex + $itemsPerPage, $totalOrders);
                    
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

                        for ($i = $startIndex; $i < $endIndex; $i++) {
                            $order = $orders[$i];
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

                        echo '<div class="pagination-container">';
                        echo '<div class="pagination">';
                        for ($page = 1; $page <= $totalPages; $page++) {
                            echo '<a class="brownbutton" href="?page=' . $page . '">' . $page . '</a>';
                        }
                        echo '</div>';
                        echo '</div>';
                        }
                    else {
                        echo "<h1>No Orders Found</h1>";
                    }  
                    
                ?>
                </section>
    </section>
    

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