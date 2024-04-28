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
        include "omnavbar2.php";
    ?>
    <br>
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
<section style="padding: 2%;">
    <div style="display: flex; flex-direction:row; justify-content:space-between; margin-bottom:2%">
                <form method="GET" action="<?php echo BASE_URL; ?>OutletControls/searchOrders" style="display: flex; flex-direction:row;">
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
    
    
    <section style="display:flex;justify-content:space-around; padding-top:3%; width:100%">
        <?php
            if($orders !=null){
            
                $itemsPerPage = 9;
                $totalOrders = count($orders);
                $totalPages = ceil($totalOrders / $itemsPerPage);

                // Assuming you have a page parameter in your URL, e.g., ?page=2
                $currentPage = isset($_GET['page']) ? max(1, min((int)$_GET['page'], $totalPages)) : 1;

                $startIndex = ($currentPage - 1) * $itemsPerPage;
                $endIndex = min($startIndex + $itemsPerPage, $totalOrders);

                echo '<div class="table-container">';
                echo '<table>';
                echo '<tr>
                    <th>ORDER REF</th>
                    <th>DELIVERY DATE</th>
                    <th>TOTAL(Rs)</th>
                    <th>MORE</th>
                </tr>';

                for ($i = $startIndex; $i < $endIndex; $i++) {
                    $order = $orders[$i];
                    echo '<tr>';
                    echo '<td>' . $order->orderref. '</td>';
                    echo '<td>' . $order->orderdate . '</td>';
                    echo '<td>' . $order->total . '.00</td>';
                    echo "<td><button class='bluebutton' onclick='more(\"" . $order->unique_id . "\")'>More</button></td>";
                    echo '</tr>';
                }

                echo '</table>';
        
    
            echo '<div class="pagination-container">';
            echo '<div class="pagination">';
            for ($page = 1; $page <= $totalPages; $page++) {
                echo '<a class="brownbutton" href="?page=' . $page . '">' . $page . '</a>';
            }
            echo '</div>';
            echo '</div>';

        }else{
            echo '<h1>No Orders Found<?h1>';
        }
        ?>


    </section>
</section>
     <script>

        var BASE_URL = "<?php echo BASE_URL; ?>";

        function dashboard(){
            window.location.href = BASE_URL + "outletControls/index";
        }

        function more(unique_id){
            window.location.href = BASE_URL + "OrderControls/moredetails/" + unique_id;
        }

        function clearSearch(){
            window.location.href = BASE_URL + "outletControls/purchasehistory/";
        }


     
     </script>


</body>
</html>







