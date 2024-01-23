<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <title>Item</title>
</head>
<body>
   

            <?php
                include "adminnav.php";
            ?>
        
            <h1>Available Item</h1>
            <?php
                echo '<table>';
                echo '<tr>
                    <th>Item ID</th>
                    <th>Item Code</th>
                    <th>Retail Price</th>
                    <th>Stock Price</th>
                    <th>Item Description</th>
                    <th>Item Name</th>
                    <th>category</th>
                    <th>Image</th>
                    <th>Availability</th>
                    <th>Update</th>
                    <th>Delete</th>

                </tr>';
                
                foreach ($items as $item) {
                    if ($item->availability == 1) {
                        echo '<tr>';
                        echo '<td>' . $item->itemid . '</td>';
                        echo '<td>' . $item->Itemcode . '</td>';
                        echo '<td>' . $item->retailprice . '</td>';
                        echo '<td>' . $item->stockprice . '</td>';
                        echo '<td>' . $item->itemdescription . '</td>';
                        echo '<td>' . $item->itemname . '</td>';
                        echo '<td>' . $item->category . '</td>';
                        echo '<td><img src="' . BASE_URL . 'media/uploads/Product/' . $item->imagelink . '" width="100px" height="100px"></td>';
                        echo '<td>' . $item->availability . '</td>';
                        echo '<td><button onclick="edit(' . $item->itemid . ')">Update</button></td>';
                        echo '<td><button onclick="del(' . $item->itemid . ')">Delete</button></td>';
                        echo '</tr>';
                    }
                }
                
                echo '</table>';
                ?>

                <h1>Unavailable Item</h1>
                <?php
                echo '<table>';
                echo '<tr>
                    <th>Item ID</th>
                    <th>Item Code</th>
                    <th>Retail Price</th>
                    <th>Stock Price</th>
                    <th>Item Description</th>
                    <th>Item Name</th>
                    <th>category</th>
                    <th>Image</th>
                    <th>Availability</th>
                    <th>Update</th>
                    <th>Delete</th>

                </tr>';
                
                foreach ($items as $item) {
                    if ($item->availability == 0) {
                        echo '<tr>';
                        echo '<td>' . $item->itemid . '</td>';
                        echo '<td>' . $item->Itemcode . '</td>';
                        echo '<td>' . $item->retailprice . '</td>';
                        echo '<td>' . $item->stockprice . '</td>';
                        echo '<td>' . $item->itemdescription . '</td>';
                        echo '<td>' . $item->itemname . '</td>';
                        echo '<td>' . $item->category . '</td>';
                        echo '<td><img src="' . BASE_URL . 'media/uploads/Product/' . $item->imagelink . '" width="100px" height="100px"></td>';
                        echo '<td>' . $item->availability . '</td>';
                        echo '<td><button onclick="edit(' . $item->itemid . ')">Update</button></td>';
                        echo '<td><button onclick="undo(' . $item->itemid . ')">Undo</button></td>';
                        echo '</tr>';
                    }
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

        function undo(itemid) {
            window.location.href = BASE_URL + "AdminControls/undoproduct/"+itemid;
        }
    </script>

</body>
</html>
           