<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://localhost/we_bake/app/views/admin/adminstyle.css">
    <title>Item</title>
</head>
<body style="font-weight: 800">
   
    <div class="container">
        <div class="navbar">
            <h1 class="dashboard">Items</h1>
            <button class="navbutton" onclick="back()">Back</button>
        </div>

        <div class="content">
            <div class="suppdash">
                <button class="formbutton" onclick="add()">Add New Products</button>
            </div>

            <div>
                
            <?php
                echo '<table>';
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
            </div>
        </div>
    </div>

    <script>
        function back() {
            window.location.href = "http://localhost/we_bake/public/AdminControls";
        }

        function add() {
            window.location.href = "http://localhost/we_bake/public/AdminControls/AddItem";
        }

        function edit(itemid) {
            window.location.href = "http://localhost/we_bake/public/AdminControls/EditItem/"+itemid;
        }

        function del(itemid) {
            window.location.href = "http://localhost/we_bake/public/AdminControls/deleteproduct/"+itemid;
        }
    </script>

</body>
</html>
           