<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item</title>
</head>
<body>
   

            <?php
                include "adminnav.php"
            ?>
            
            <button  onclick="add()">Add New Products</button>

            <?php
                echo '<table style="margin-left:-5%">';
                echo '<tr>
                    <th>Item ID</th>
                    <th>Retail Price</th>
                    <th>Stock Price</th>
                    <th>Item Description</th>
                    <th>Item Name</th>
                    <th>Update</th>
                    <th>Delete</th>

                </tr>';
                
                foreach ($items as $item) {
                    echo '<tr>';
                    echo '<td>' . $item->itemid . '</td>';
                    echo '<td>' . $item->retailprice . '</td>';
                    echo '<td>' . $item->stockprice . '</td>';
                    echo '<td>' . $item->itemdescription . '</td>';
                    echo '<td>' . $item->itemname . '</td>';
                    echo '<td><button onclick="edit(' . $item->itemid . ')">Update</button></td>';
                    echo '<td><button onclick="del(' . $item->itemid . ')">Delete</button></td>';
                    echo '</tr>';
                }
                
                echo '</table>';
                ?>

    <script>

        var BASE_URL = "<?php echo BASE_URL; ?>";

        function add() {
            window.location.href = BASE_URL + "AdminControls/AddItem";
        }

        function edit(itemid) {
            window.location.href = BASE_URL + "AdminControls/EditItem/"+itemid;
        }

        function del(itemid) {
            window.location.href = BASE_URL + "AdminControls/deleteproduct/"+itemid;
        }
    </script>

</body>
</html>
           