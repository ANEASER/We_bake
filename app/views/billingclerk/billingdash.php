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
    <title>Billing Clerk</title>
</head>

<body>
    <?php
        require_once('bcnavbar.php');
    ?>

        <div style="display: flex; flex-direction:row; justify-content:space-between; padding:2%;">
                <form method="GET" action="<?php echo BASE_URL; ?>OrderControls/searchOrders" class="search">
                    <?php
                    if (isset($_GET['search'])) {
                        echo '<input type="text" id="search" name="search" placeholder="Enter Order ID" value="' . $_GET['search'] . '" class="search">';
                    } else {
                        echo '<input type="text" id="search" name="search" placeholder="Enter Order ID" class="search">';
                    }
                    ?>
                    <input type="submit" value="Search" class="searchbutton">
                </form>

            
                <ul style="display: flex; padding: 0; list-style: none; margin: 0;">
                    <li style="margin-right: 10px;"><a onclick="showPendingOrders(this)" style="padding: 5px;">Pending Orders</a></li>
                    <li style="margin-right: 10px;"><a onclick="showAdvancedOrders(this)" style="padding: 5px;">Advanced Orders</a></li>
                    <li style="margin-right: 10px;"><a onclick="showPaidOrders(this)" style="padding: 5px;">Paid Orders</a></li>
                    <li><a onclick="showClosedOrders(this)" style="padding: 5px;">Closed Orders</a></li>
                </ul>
        </div>
    <section style="display:flex;justify-content:space-around; padding-top:3%; width:100%">
<?php
        if (isset($_GET['search'])) {

            echo "<div id='searchedOrdersTable'>";
            echo "searchedOrdersTable";
            echo "<table>";
            echo "<tr>
                    <th>Order ID</th>
                    <th>Placed By</th>
                    <th>Order Date</th>
                    <th>Payment Status</th>
                    <th>Delivery Status</th>
                    <th>Total</th>
                    <th>Deliver By</th>
                    <th>Ordder reference</th>
                    <th>Deliver Address</th>
                    <th>Update</th>
                    <th>More</th>
                </tr>";

            if (!empty($foundorders)) {
                foreach ($foundorders as $productorder) {
                    echo "<tr>";
                    echo "<td>" . $productorder->orderid . "</td>";
                    echo "<td>" . $productorder->placeby . "</td>";
                    echo "<td>" . $productorder->orderdate . "</td>";
                    echo "<td>" . $productorder->paymentstatus . "</td>";
                    echo "<td>" . $productorder->deliverystatus . "</td>";
                    echo "<td>" . $productorder->total . "</td>";
                    echo "<td>" . $productorder->deliverby . "</td>";
                    echo "<td>" . $productorder->orderref . "</td>";
                    echo "<td>" . $productorder->deliver_address . "</td>";
                    echo "<td><button onclick='Process(\"" . $productorder->orderid . "\", \"" . $productorder->paymentstatus . "\")'>Complete</button></td>";
                    echo "<td><button onclick='more(\"" . $productorder->unique_id . "\", \"" . $productorder->orderid . "\")'>More</button></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='12'>No orders found.</td></tr>";
            }

            echo "</table>";
            echo "</div>";
        }
        ?>

<?php
            
            echo "<div id='pendingOrdersTable'>";
            echo "<table>";
            echo "<tr>
                <th>Order ID</th>
                <th>Placed By</th>
                <th>Order Date</th>
                <th>Payment Status</th>
                <th>Delivery Status</th>
                <th>Total</th>
                <th>Deliver By</th>
                <th>Ordder reference</th>
                <th>Deliver Address</th>
                <th>Update</th>
                <th>More</th>
            </tr>";

            foreach($data["productorders"] as $productorder){ 

                if($productorder->orderstatus == "pending" && $productorder->paymentstatus == "pending"){
                    echo "<tr>";
                    echo "<td>" . $productorder->orderid . "</td>";
                    echo "<td>" . $productorder->placeby . "</td>";
                    echo "<td>" . $productorder->orderdate . "</td>";
                    echo "<td>" . $productorder->paymentstatus . "</td>";
                    echo "<td>" . $productorder->deliverystatus . "</td>";
                    echo "<td>" . $productorder->total . "</td>";
                    echo "<td>" . $productorder->deliverby . "</td>";
                    echo "<td>" . $productorder->orderref . "</td>";
                    echo "<td>" . $productorder->deliver_address . "</td>";
                    echo "<td><button onclick='Process(\"" . $productorder->orderid . "\", \"" . $productorder->paymentstatus . "\")'>Complete</button></td>";
                    echo "<td><button onclick='more(\"" . $productorder->unique_id . "\", \"" . $productorder->orderid . "\")'>More</button></td>";
                    echo "</tr>";
                }    
            }    
            
            echo "</table>";
            echo "</div>";
    
    ?>

<?php
        
        echo "<div id='advancedOrdersTable'>";
        echo "<table>";
        echo "<tr>
            <th>Order ID</th>
            <th>Placed By</th>
            <th>Order Date</th>
            <th>Payment Status</th>
            <th>Delivery Status</th>
            <th>Total</th>
            <th>Deliver By</th>
            <th>Ordder reference</th>
            <th>Deliver Address</th>
            <th>Update</th>
            <th>More</th>
        </tr>";

        foreach($data["productorders"] as $productorder){ 

            if($productorder->orderstatus == "pending" && $productorder->paymentstatus == "advanced"){
                echo "<tr>";
                echo "<td>" . $productorder->orderid . "</td>";
                echo "<td>" . $productorder->placeby . "</td>";
                echo "<td>" . $productorder->orderdate . "</td>";
                echo "<td>" . $productorder->paymentstatus . "</td>";
                echo "<td>" . $productorder->deliverystatus . "</td>";
                echo "<td>" . $productorder->total . "</td>";
                echo "<td>" . $productorder->deliverby . "</td>";
                echo "<td>" . $productorder->orderref . "</td>";
                echo "<td>" . $productorder->deliver_address . "</td>";
                echo "<td><button onclick='Process(\"" . $productorder->orderid . "\", \"" . $productorder->paymentstatus . "\")'>Complete</button></td>";
                echo "<td><button onclick='more(\"" . $productorder->unique_id . "\", \"" . $productorder->orderid . "\")'>More</button></td>";
                echo "</tr>";
            }    
        }    
        
        echo "</table>";
        echo "</div>";

?>

<?php
        
        echo "<div id='paidOrdersTable'>";
        echo "<table>";
        echo "<tr>
            <th>Order ID</th>
            <th>Placed By</th>
            <th>Order Date</th>
            <th>Payment Status</th>
            <th>Delivery Status</th>
            <th>Total</th>
            <th>Deliver By</th>
            <th>Ordder reference</th>
            <th>Deliver Address</th>
            <th>Update</th>
            <th>More</th>
        </tr>";

        foreach($data["productorders"] as $productorder){ 

            if($productorder->orderstatus == "pending" && $productorder->paymentstatus == "paid"){
                echo "<tr>";
                echo "<td>" . $productorder->orderid . "</td>";
                echo "<td>" . $productorder->placeby . "</td>";
                echo "<td>" . $productorder->orderdate . "</td>";
                echo "<td>" . $productorder->paymentstatus . "</td>";
                echo "<td>" . $productorder->deliverystatus . "</td>";
                echo "<td>" . $productorder->total . "</td>";
                echo "<td>" . $productorder->deliverby . "</td>";
                echo "<td>" . $productorder->orderref . "</td>";
                echo "<td>" . $productorder->deliver_address . "</td>";
                echo "<td><button onclick='Process(\"" . $productorder->orderid . "\", \"" . $productorder->paymentstatus . "\")'>Complete</button></td>";
                echo "<td><button onclick='more(\"" . $productorder->unique_id . "\", \"" . $productorder->orderid . "\")'>More</button></td>";
                echo "</tr>";
            }    
        }    
        
        echo "</table>";
        echo "</div>";

    ?>
<?php
            
            echo "<div id='closedOrdersTable'>";
            echo "<table>";
            echo "<tr>
                <th>Order ID</th>
                <th>Placed By</th>
                <th>Order Date</th>
                <th>Payment Status</th>
                <th>Delivery Status</th>
                <th>Total</th>
                <th>Deliver By</th>
                <th>Ordder reference</th>
                <th>Deliver Address</th>
                <th>Update</th>
                <th>More</th>
            </tr>";

            foreach($data["productorders"] as $productorder){ 

                if($productorder->orderstatus == "closed"){
                    echo "<tr>";
                    echo "<td>" . $productorder->orderid . "</td>";
                    echo "<td>" . $productorder->placeby . "</td>";
                    echo "<td>" . $productorder->orderdate . "</td>";
                    echo "<td>" . $productorder->paymentstatus . "</td>";
                    echo "<td>" . $productorder->deliverystatus . "</td>";
                    echo "<td>" . $productorder->total . "</td>";
                    echo "<td>" . $productorder->deliverby . "</td>";
                    echo "<td>" . $productorder->orderref . "</td>";
                    echo "<td>" . $productorder->deliver_address . "</td>";
                    echo "<td><button onclick='Process(\"" . $productorder->orderid . "\", \"" . $productorder->paymentstatus . "\")'>Complete</button></td>";
                    echo "<td><button onclick='more(\"" . $productorder->unique_id . "\", \"" . $productorder->orderid . "\")'>More</button></td>";
                    echo "</tr>";
                }    
            }    
            
            echo "</table>";
            echo "</div>";
    
?>
</section>
    <script>
        
        var BASE_URL = "<?php echo BASE_URL; ?>";

            
        function changeActive(link) {
            var links = document.querySelectorAll('body div ul li a');
            links.forEach(function (el) {
                el.classList.remove('active');
            });

            link.classList.add('active');
        }

        function showSearchOrders(){
            document.getElementById('pendingOrdersTable').style.display = 'none';
            document.getElementById('advancedOrdersTable').style.display = 'none';
            document.getElementById('paidOrdersTable').style.display = 'none';
            document.getElementById('closedOrdersTable').style.display = 'none';
            document.getElementById('searchedOrdersTable').style.display = 'block';
        }

        function showPendingOrders(link) {
            changeActive(link);
            document.getElementById('pendingOrdersTable').style.display = 'block';
            document.getElementById('advancedOrdersTable').style.display = 'none';
            document.getElementById('paidOrdersTable').style.display = 'none';
            document.getElementById('closedOrdersTable').style.display = 'none';
            document.getElementById('searchedOrdersTable').style.display = 'none';
        }

        function showAdvancedOrders(link) {
            changeActive(link);
            document.getElementById('pendingOrdersTable').style.display = 'none';
            document.getElementById('advancedOrdersTable').style.display = 'block';
            document.getElementById('paidOrdersTable').style.display = 'none';
            document.getElementById('closedOrdersTable').style.display = 'none';
            document.getElementById('searchedOrdersTable').style.display = 'none';
        }

        function showPaidOrders(link) {
            changeActive(link);
            document.getElementById('paidOrdersTable').style.display = 'block';
            document.getElementById('closedOrdersTable').style.display = 'none';
            document.getElementById('pendingOrdersTable').style.display = 'none';
            document.getElementById('advancedOrdersTable').style.display = 'none';
            document.getElementById('searchedOrdersTable').style.display = 'none';
        }

        function showClosedOrders(link) {
            changeActive(link);
            document.getElementById('paidOrdersTable').style.display = 'none';
            document.getElementById('closedOrdersTable').style.display = 'block';
            document.getElementById('pendingOrdersTable').style.display = 'none';
            document.getElementById('advancedOrdersTable').style.display = 'none';
            document.getElementById('searchedOrdersTable').style.display = 'none';
        }

        document.addEventListener('DOMContentLoaded', function () {
            var firstLink;

            <?php if (isset($_GET['search'])) : ?>
                firstLink = document.querySelector('body div ul li a');
                if (firstLink) {
                    changeActive(firstLink);
                    showSearchOrders(firstLink);
                }
            <?php else : ?>
                // Set first link for non-search case
                firstLink = document.querySelector('body div ul li a');
                if (firstLink) {
                    changeActive(firstLink);
                    showPendingOrders(firstLink);
                }
            <?php endif; ?>
        });


    </script>
</body>
</html>
