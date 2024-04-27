<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/tables.css">
    <title>Reports</title>
</head>
<body>
    <?php
        include "ownernavbar.php";
    ?>

<style>
        .pagination-container {
            text-align: center;
            margin-top: 10px; /* Adjust as needed */
            max-width: 620px;
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
    <section style="display:flex;justify-content:space-between; padding:3%; width:90%;margin-left:7%">

        <section style="width: 50%; display:flex;flex-direction:column">
        <?php
                $itemsPerPage = 6;
                $totalOrders = count($productorderlines);
                $totalPages = ceil($totalOrders / $itemsPerPage);

                // Assuming you have a page parameter in your URL, e.g., ?page=2
                $currentPage = isset($_GET['page']) ? max(1, min((int)$_GET['page'], $totalPages)) : 1;

                $startIndex = ($currentPage - 1) * $itemsPerPage;
                $endIndex = min($startIndex + $itemsPerPage, $totalOrders);

                echo '<div class="table-container">';
                echo "<table>";
                echo "<tr>
                        <th>Item Code</th>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Total Price</th>   
                    </tr>";

                foreach (array_slice($productorderlines, $startIndex, $itemsPerPage) as $productorderline) {
                    $productitem = new ProductItem();
                    $item = $productitem->where('Itemcode', $productorderline->Itemcode);
                    
                    echo "<tr>";
                    echo "<td>" . $productorderline->Itemcode . "</td>";
                    echo "<td>" . $item[0]->itemname. "</td>";
                    echo "<td>" . $productorderline->quantity . "</td>";
                    echo "<td>" . $productorderline->totalprice . "</td>";
                    echo "</tr>";
                }

                echo "</table>";
                echo'<br>';
                echo'<br>';

                // Pagination links
                echo '<div class="pagination-container">';
                echo '<div class="pagination">';
                
                // Previous page arrow
                if ($currentPage > 1) {
                    echo '<a class="brownbutton" href="?page=' . ($currentPage - 1) . '">&lt;</a>'; // &lt; is the HTML entity for "<"
                }

                // Display current page number
                echo '<a class="brownbutton current-page">' . $currentPage . '</a>';

                // Next page arrow
                if ($currentPage < $totalPages) {
                    echo '<a class="brownbutton" href="?page=' . ($currentPage + 1) . '">&gt;</a>'; // &gt; is the HTML entity for ">"
                }

                echo '</div>'; // Close pagination
                echo '</div>'; // Close pagination container
            ?>
            <?php
                echo '<br>';   
                echo "<h2 style='text-align:center'>Filter Orders and Download Report</h2>";
                echo '<br>';
                echo '<form method="post" action="backend.php">'; // Change backend.php to your actual backend endpoint
                echo '<label for="timeslot">Time Slot : </label>';

                echo '<input type="date" id="timeslot" name="starttime">';
                echo ' : ';
                echo '<input type="date" id="timeslot" name="starttime">';

                echo '<input type="submit" value="Submit">';
                echo '</form>';
            ?>



        </section>

        <section style="width: 50%; display:flex;flex-direction:column">
        <?php
            $itemsPerPage = 5;
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
                <th>ORDER STATUS</th>
                <th>TOTAL(Rs)</th>
                <th>MORE</th>
            </tr>';

            for ($i = $startIndex; $i < $endIndex; $i++) {
                $order = $orders[$i];
                //if($order->orderstatus == "cancelled" || $order->orderstatus == "finished"){
                    echo '<tr>';
                    echo '<td>' . $order->orderref. '</td>';
                    echo '<td>' . $order->orderdate . '</td>';
                    echo '<td class="hideonmobile">' . $order->orderstatus . '</td>';
                    echo '<td>' . $order->total . '.00</td>';
                    echo "<td><button class='bluebutton' onclick='more(\"" . $order->unique_id . "\")'>More</button></td>";
                    echo '</tr>';
                //}
            }

            echo '</table>';
            echo'<br>';
            echo'<br>';
        ?>
        <?php
            echo '<div class="pagination-container">';
            echo '<div class="pagination">';
            if ($currentPage > 1) {
                echo '<a class="brownbutton" href="?page=' . ($currentPage - 1) . '">&lt;</a>'; // &lt; is the HTML entity for "<"
            }
            echo '<a class="brownbutton current-page">' . $currentPage . '</a>';

            if ($currentPage < $totalPages) {
                echo '<a class="brownbutton" href="?page=' . ($currentPage + 1) . '">&gt;</a>'; // &gt; is the HTML entity for ">"
            }
            echo '</div>'; 
            echo '</div>'; 
        ?>
        <?php
            echo '<br>';   
            echo "<h2 style='text-align:center'>Filter Orders and Download Report</h2>";
            echo '<br>';
            echo '<form method="post" action="backend.php">'; // Change backend.php to your actual backend endpoint
            echo '<label for="timeslot">Time Slot : </label>';

            echo '<input type="date" id="timeslot" name="starttime">';
            echo ' : ';
            echo '<input type="date" id="timeslot" name="starttime">';

            echo '<label for="orderstatus"> Order Status : </label>';
            echo '<input type="text" id="orderstatus" name="orderstatus">';
            echo '<input type="submit" value="Submit">';
            echo '</form>';
        ?>
    </section>

    </section>
    <script>

        function more(unique_id){
            window.location.href = BASE_URL + "OrderControls/moredetails/" + unique_id;
        }

    </script>
</body>
</html>
